<?php

namespace DemoApp;

require_once __DIR__ . '/../vendor/autoload.php';
// remove this line when installing from github. This is needed to ensure Symfony's autoloader is used
require_once __DIR__ . '/../../../vendor/autoload.php';

use PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient;
use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;
use PayoneCommercePlatform\Sdk\ApiClient\OrderManagementCheckoutActionsApiClient;
use PayoneCommercePlatform\Sdk\ApiClient\PaymentExecutionApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Models\Address;
use PayoneCommercePlatform\Sdk\Models\AddressPersonal;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\BankAccountInformation;
use PayoneCommercePlatform\Sdk\Models\CartItemInput;
use PayoneCommercePlatform\Sdk\Models\CartItemInvoiceData;
use PayoneCommercePlatform\Sdk\Models\CheckoutReferences;
use PayoneCommercePlatform\Sdk\Models\CompleteFinancingPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\CompletePaymentRequest;
use PayoneCommercePlatform\Sdk\Models\ContactDetails;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest;
use PayoneCommercePlatform\Sdk\Models\Customer;
use PayoneCommercePlatform\Sdk\Models\CustomerDevice;
use PayoneCommercePlatform\Sdk\Models\DeliverRequest;
use PayoneCommercePlatform\Sdk\Models\DeliverType;
use PayoneCommercePlatform\Sdk\Models\FinancingPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\MandateRecurrenceType;
use PayoneCommercePlatform\Sdk\Models\OrderLineDetailsInput;
use PayoneCommercePlatform\Sdk\Models\OrderRequest;
use PayoneCommercePlatform\Sdk\Models\OrderType;
use PayoneCommercePlatform\Sdk\Models\PatchCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Models\PaymentExecutionRequest;
use PayoneCommercePlatform\Sdk\Models\PaymentExecutionSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct3391SpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct3392SpecificInput;
use PayoneCommercePlatform\Sdk\Models\PersonalInformation;
use PayoneCommercePlatform\Sdk\Models\PersonalName;
use PayoneCommercePlatform\Sdk\Models\ProcessingMandateInformation;
use PayoneCommercePlatform\Sdk\Models\ProductType;
use PayoneCommercePlatform\Sdk\Models\References;
use PayoneCommercePlatform\Sdk\Models\SepaDirectDebitPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\SepaDirectDebitPaymentProduct771SpecificInput;
use PayoneCommercePlatform\Sdk\Models\Shipping;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartInput;

class DemoApp
{
    protected string $merchantId = '';
    protected CommunicatorConfiguration $config;
    protected CheckoutApiClient $checkoutClient;
    protected CommerceCaseApiClient $commerceCaseClient;
    protected OrderManagementCheckoutActionsApiClient $orderManagementCheckoutClient;
    protected PaymentExecutionApiClient $paymentExecutionClient;

    public function __construct()
    {
        $apiKey = getenv('API_KEY');
        if (empty($apiKey)) {
            throw new \RuntimeException('required environment variable API_KEY is not set');
        }
        $apiSecret = getenv('API_SECRET');
        if (empty($apiSecret)) {
            throw new \RuntimeException('required environment variable API_SECRET is not set');
        }
        $this->merchantId = getenv('MERCHANT_ID');
        if (empty($this->merchantId)) {
            throw new \RuntimeException('required environment variable MERCHANT_ID is not set');
        }
        $this->config = new CommunicatorConfiguration(
            apiKey: $apiKey,
            apiSecret: $apiSecret,
            host: CommunicatorConfiguration::getPredefinedHosts()['preprod']['url'],
        );
        $this->checkoutClient = new CheckoutApiClient($this->config);
        $this->commerceCaseClient = new CommerceCaseApiClient($this->config);
        $this->paymentExecutionClient = new PaymentExecutionApiClient($this->config);
        $this->orderManagementCheckoutClient = new OrderManagementCheckoutActionsApiClient($this->config);
    }

    protected function runCheckoutWithPaymentExecution(string $commerceCaseMerchantReference): void
    {
        // Create a commerce case, add customer data, put something into the shopping cart
        /** @var CreateCommerceCaseRequest */
        $createCommerceCaseRequest = new CreateCommerceCaseRequest(
            customer: new Customer(
                personalInformation: new PersonalInformation(
                    dateOfBirth: "19991112",
                    name: new PersonalName(firstName: "Ryan", surname: "Carniato"),
                ),
                contactDetails: new ContactDetails(
                    emailAddress: "mail@mail.com",
                ),
                billingAddress: new Address(
                    countryCode: "DE",
                    zip: "24937",
                    city: "Flensburg",
                    street: "Rathausplatz",
                    houseNumber: "1",
                ),
            ),
            checkout: new CreateCheckoutRequest(
                amountOfMoney: new AmountOfMoney(amount: 3599, currencyCode: "EUR"),
                shipping: new Shipping(
                    address: new AddressPersonal(
                        countryCode: "DE",
                        zip: "24937",
                        city: "Flensburg",
                        street: "Rathausplatz",
                        houseNumber: "1"
                    )
                ),
                shoppingCart: new ShoppingCartInput(
                    items: [new CartItemInput(
                        invoiceData: new CartItemInvoiceData(
                            description: "T-Shirt - Scaleshape Logo - S",
                        ),
                        orderLineDetails: new OrderLineDetailsInput(
                            productPrice: 3599,
                            quantity: 1,
                            productType: ProductType::GOODS,
                        ),
                    )],
                ),
            )
        );

        $commerceCase = $this->commerceCaseClient->createCommerceCase($this->merchantId, $createCommerceCaseRequest);

        $paymentExecutionRequest = new PaymentExecutionRequest(
            paymentExecutionSpecificInput: new PaymentExecutionSpecificInput(
                paymentReferences: new References(merchantReference: "p-" . $commerceCaseMerchantReference),
                amountOfMoney: new AmountOfMoney(amount: 3599, currencyCode: "EUR"),
            ),
            paymentMethodSpecificInput: new PaymentMethodSpecificInput(
                sepaDirectDebitPaymentMethodSpecificInput: new SepaDirectDebitPaymentMethodSpecificInput(
                    paymentProductId: 771,
                    paymentProduct771SpecificInput: new SepaDirectDebitPaymentProduct771SpecificInput(
                        mandate: new ProcessingMandateInformation(
                            bankAccountIban: new BankAccountInformation(
                                iban: "DE75512108001245126199",
                                accountHolder: "Ryan Carniato",
                            ),
                            dateOfSignature: "20240730",
                            recurrenceType: MandateRecurrenceType::UNIQUE,
                            uniqueMandateReference: "m-" . $commerceCaseMerchantReference,
                            creditorId: "DE98ZZZ09999999999",
                        ),
                    ),
                ),
            ),
        );

        $paymentResponse = $this->paymentExecutionClient->createPayment(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            $paymentExecutionRequest
        );
        var_dump($paymentResponse);

        $finalCheckout = $this->checkoutClient->getCheckout(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
        );
        var_dump($finalCheckout);
    }

    protected function runMultistepCheckoutForPayoneSecuredInstallment(
        string $commerceCaseMerchantReference,
        CustomerDevice $customerDevice
    ): void {
        // create the commercase
        $commerceCase = $this->commerceCaseClient->createCommerceCase(
            $this->merchantId,
            new CreateCommerceCaseRequest(
                customer: new Customer(
                    businessRelation: "B2C",
                    locale: "de",
                    personalInformation: new PersonalInformation(
                        dateOfBirth: "19840604",
                        name: new PersonalName(firstName: "Rich", surname: "Harris")
                    ),
                    contactDetails: new ContactDetails(emailAddress: 'mail@mail.com'),
                    billingAddress: new Address(
                        countryCode: 'DE',
                        zip: '40474',
                        city: 'Düsseldorf',
                        street: 'Cecilienallee',
                        houseNumber: '2',
                    ),
                ),
                checkout: new CreateCheckoutRequest(
                    shoppingCart: new ShoppingCartInput(
                        items: [new CartItemInput(
                            invoiceData: new CartItemInvoiceData('Frankenstein - Mary Shelley - Hardcover'),
                            orderLineDetails: new OrderLineDetailsInput(
                                productCode: 'shelley-42',
                                productPrice: 1999,
                                quantity: 1,
                                productType: ProductType::GOODS,
                                taxAmount: 19,
                            ),
                        )],
                    ),
                ),
            )
        );
        // add shipping information
        $this->checkoutClient->updateCheckout(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new PatchCheckoutRequest(
                shipping: new Shipping(
                    address: new AddressPersonal(
                        countryCode: 'DE',
                        zip: '40474',
                        city: 'Düsseldorf',
                        street: 'Cecilienallee',
                        houseNumber: '2',
                    )
                )
            ),
        );
        // confirm the order
        $order = $this->orderManagementCheckoutClient->createOrder(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new OrderRequest(
                orderType: OrderType::FULL,
                orderReferences: new References(merchantReference: 'o-' . $commerceCaseMerchantReference),
                paymentMethodSpecificInput: new PaymentMethodSpecificInput(
                    paymentChannel: PaymentChannel::ECOMMERCE,
                    customerDevice: $customerDevice,
                    financingPaymentMethodSpecificInput: new FinancingPaymentMethodSpecificInput(
                        paymentProductId: 3391,
                    ),
                ),
            ),
        );
        var_dump($order);
        /** @var InstallmentOption[]|null */
        $installmentOptions = [];
        if (
            $order->getCreatePaymentResponse() !== null
        && $order->getCreatePaymentResponse()->getPayment !== null
        && $order->getCreatePaymentResponse()->getPayment()->getPaymentOutput() !== null
        && $order->getCreatePaymentResponse()->getPayment()->getPaymentOutput()->getFinancingPaymentMethodSpecificOutput() !== null
        && $order->getCreatePaymentResponse()->getPayment()->getPaymentOutput()->getFinancingPaymentMethodSpecificOutput()->getPaymentProduct3391SpecificOutput() !== null
        ) {
            $installmentOptions = $order->getCreatePaymentResponse()->getPayment()->getPaymentOutput()->getFinancingPaymentMethodSpecificOutput()->getPaymentProduct3391SpecificOutput()->getInstallmentOptions();
        } else {
            throw new \RuntimeException('PCP API did not provide installment options, you may need to contact PAYONE support.');
        }
        var_dump($installmentOptions);

        // A secured installment has to be completed first
        $completePaymentResponse = $this->paymentExecutionClient->completePayment(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new CompletePaymentRequest(
                financingPaymentMethodSpecificInput: new CompleteFinancingPaymentMethodSpecificInput(
                    requiresApproval: false,
                    paymentProductId: 3391,
                    paymentProduct3391SpecificInput: new PaymentProduct3391SpecificInput(
                        installmentOptionId: $installmentOptions[0]->getInstallmentOptionId(),
                        bankAccountInformation: new BankAccountInformation(
                            iban: 'DE75512108001245126199',
                            accountHolder: 'Rich Harris',
                        )
                    ),
                )
            ),
        );
        var_dump($completePaymentResponse);

        // wait for the webhook from the payla platform, to ensure that the payment is actually
        // authorized and can be captured

        // Payla webhook was succesfully send!
        // items are ready for shipment, the delivery can be performed to capture the money from the reservation
        $delivery = $this->orderManagementCheckoutClient->deliverOrder(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new DeliverRequest(deliverType: DeliverType::FULL, isFinal: true),
        );
        var_dump($delivery);
    }

    protected function runMultistepCheckoutForPayoneSecuredDirectDebit(
        string $commerceCaseMerchantReference,
        CustomerDevice $customerDevice,
    ): void {
        // create the commercase
        $commerceCase = $this->commerceCaseClient->createCommerceCase(
            $this->merchantId,
            new CreateCommerceCaseRequest(
                customer: new Customer(
                    businessRelation: "B2C",
                    locale: "de",
                    personalInformation: new PersonalInformation(
                        dateOfBirth: "19840604",
                        name: new PersonalName(firstName: "Rich", surname: "Harris")
                    ),
                    contactDetails: new ContactDetails(emailAddress: 'mail@mail.com'),
                    billingAddress: new Address(
                        countryCode: 'DE',
                        zip: '40474',
                        city: 'Düsseldorf',
                        street: 'Cecilienallee',
                        houseNumber: '2',
                    ),
                ),
                checkout: new CreateCheckoutRequest(
                    shoppingCart: new ShoppingCartInput(
                        items: [new CartItemInput(
                            invoiceData: new CartItemInvoiceData('Frankenstein - Mary Shelley - Hardcover'),
                            orderLineDetails: new OrderLineDetailsInput(
                                productCode: 'shelley-42',
                                productPrice: 1999,
                                quantity: 1,
                                productType: ProductType::GOODS,
                                taxAmount: 19,
                            ),
                        )],
                    ),
                ),
            )
        );
        // add shipping information
        $this->checkoutClient->updateCheckout(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new PatchCheckoutRequest(
                shipping: new Shipping(
                    address: new AddressPersonal(
                        countryCode: 'DE',
                        zip: '40474',
                        city: 'Düsseldorf',
                        street: 'Cecilienallee',
                        houseNumber: '2',
                    )
                )
            ),
        );
        // confirm the order
        $order = $this->orderManagementCheckoutClient->createOrder(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new OrderRequest(
                orderType: OrderType::FULL,
                orderReferences: new References(merchantReference: 'o-' . $commerceCaseMerchantReference),
                paymentMethodSpecificInput: new PaymentMethodSpecificInput(
                    paymentChannel: PaymentChannel::ECOMMERCE,
                    customerDevice: $customerDevice,
                    financingPaymentMethodSpecificInput: new FinancingPaymentMethodSpecificInput(
                        paymentProductId: 3392,
                        requiresApproval: true,
                        paymentProduct3392SpecificInput: new PaymentProduct3392SpecificInput(
                            bankAccountInformation: new BankAccountInformation(
                                iban: 'DE75512108001245126199',
                                accountHolder: 'Rich Harris',
                            ),
                        ),
                    ),
                ),
            ),
        );
        var_dump($order);

        $checkout = $this->checkoutClient->getCheckout($this->merchantId, $commerceCase->getCommerceCaseId(), $commerceCase->getCheckout()->getCheckoutId());
        var_dump($checkout);

        // wait for the webhook from the payla platform, to ensure that the payment is actually
        // authorized and can be captured

        // Payla webhook was succesfully send!
        // items are ready for shipment, the delivery can be performed to capture the money from the reservation
        $delivery = $this->orderManagementCheckoutClient->deliverOrder(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new DeliverRequest(deliverType: DeliverType::FULL, isFinal: true),
        );
        var_dump($delivery);
    }

    protected function runMultistepCheckout(string $commercaseMerchantReference): void
    {
        // create the commercase
        $commerceCase = $this->commerceCaseClient->createCommerceCase(
            $this->merchantId,
            new CreateCommerceCaseRequest(
                customer: new Customer(
                    businessRelation: "B2C",
                    locale: "de",
                    personalInformation: new PersonalInformation(
                        dateOfBirth: "19840604",
                        name: new PersonalName(firstName: "Rich", surname: "Harris")
                    ),
                    contactDetails: new ContactDetails(emailAddress: 'mail@mail.com'),
                    billingAddress: new Address(
                        countryCode: 'DE',
                        zip: '40474',
                        city: 'Düsseldorf',
                        street: 'Cecilienallee',
                        houseNumber: '2',
                    ),
                ),
                checkout: new CreateCheckoutRequest(
                    shoppingCart: new ShoppingCartInput(
                        items: [new CartItemInput(
                            invoiceData: new CartItemInvoiceData('Frankenstein - Mary Shelley - Hardcover'),
                            orderLineDetails: new OrderLineDetailsInput(
                                productCode: 'shelley-42',
                                productPrice: 1999,
                                quantity: 1,
                                productType: ProductType::GOODS,
                                taxAmount: 19,
                            ),
                        )],
                    ),
                ),
            )
        );
        // add shipping information
        $this->checkoutClient->updateCheckout(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new PatchCheckoutRequest(
                shipping: new Shipping(
                    address: new AddressPersonal(
                        countryCode: 'DE',
                        zip: '40474',
                        city: 'Düsseldorf',
                        street: 'Cecilienallee',
                        houseNumber: '2',
                    )
                )
            ),
        );
        // confirm the order
        $this->orderManagementCheckoutClient->createOrder(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new OrderRequest(
                orderType: OrderType::FULL,
                orderReferences: new References(merchantReference: 'o-' . $commercaseMerchantReference),
                paymentMethodSpecificInput: new PaymentMethodSpecificInput(
                    paymentChannel: PaymentChannel::ECOMMERCE,
                    sepaDirectDebitPaymentMethodSpecificInput: new SepaDirectDebitPaymentMethodSpecificInput(
                        paymentProductId: 771,
                        paymentProduct771SpecificInput: new SepaDirectDebitPaymentProduct771SpecificInput(
                            mandate: new ProcessingMandateInformation(
                                bankAccountIban: new BankAccountInformation(
                                    iban: 'DE75512108001245126199',
                                    accountHolder: 'Rich Harris',
                                ),
                                dateOfSignature: '20240730',
                                recurrenceType: MandateRecurrenceType::UNIQUE,
                                uniqueMandateReference: 'm-' . $commercaseMerchantReference,
                                creditorId: 'DE98ZZZ09999999999',
                            ),
                        ),
                    ),
                ),
            ),
        );

        $checkout = $this->checkoutClient->getCheckout($this->merchantId, $commerceCase->getCommerceCaseId(), $commerceCase->getCheckout()->getCheckoutId());
        var_dump($checkout);

        $delivery = $this->orderManagementCheckoutClient->deliverOrder(
            $this->merchantId,
            $commerceCase->getCommerceCaseId(),
            $commerceCase->getCheckout()->getCheckoutId(),
            new DeliverRequest(deliverType: DeliverType::FULL, isFinal: true),
        );
        var_dump($delivery);
    }

    protected function runSingleStepCheckout(string $commerceCaseMerchantReference): void
    {
        // create commerce case, checkout and execute payment in one go
        try {
            $createCommerceCaseRequest = new CreateCommerceCaseRequest(
                merchantReference: $commerceCaseMerchantReference,
                customer: new Customer(
                    personalInformation: new PersonalInformation(
                        dateOfBirth: "19840604",
                        name: new PersonalName(firstName: "Rich", surname: "Harris")
                    ),
                    contactDetails: new ContactDetails(emailAddress: 'mail@mail.com'),
                    billingAddress: new Address(
                        countryCode: 'DE',
                        zip: '40474',
                        city: 'Düsseldorf',
                        street: 'Cecilienallee',
                        houseNumber: '2',
                    ),
                ),
                checkout: new CreateCheckoutRequest(
                    autoExecuteOrder: true,
                    references: new CheckoutReferences(merchantReference: 'c-' . $commerceCaseMerchantReference),
                    amountOfMoney: new AmountOfMoney(amount: 5199, currencyCode: 'EUR'),
                    shipping: new Shipping(
                        address: new AddressPersonal(
                            countryCode: 'DE',
                            zip: '40474',
                            city: 'Düsseldorf',
                            street: 'Cecilienallee',
                            houseNumber: '2',
                        )
                    ),
                    shoppingCart: new ShoppingCartInput(
                        items: [new CartItemInput(
                            invoiceData: new CartItemInvoiceData('Hoodie - Scaleshape Logo - L'),
                            orderLineDetails: new OrderLineDetailsInput(
                                productPrice: 5199,
                                quantity: 1,
                                productType: ProductType::GOODS,
                            ),
                        )]
                    ),
                    orderRequest: new OrderRequest(
                        orderReferences: new References(merchantReference: 'o-' . $commerceCaseMerchantReference),
                        orderType: OrderType::FULL,
                        paymentMethodSpecificInput: new PaymentMethodSpecificInput(
                            sepaDirectDebitPaymentMethodSpecificInput: new SepaDirectDebitPaymentMethodSpecificInput(
                                paymentProductId: 771,
                                paymentProduct771SpecificInput: new SepaDirectDebitPaymentProduct771SpecificInput(
                                    mandate: new ProcessingMandateInformation(
                                        bankAccountIban: new BankAccountInformation(
                                            iban: 'DE75512108001245126199',
                                            accountHolder: 'Rich Harris',
                                        ),
                                        dateOfSignature: '20240730',
                                        recurrenceType: MandateRecurrenceType::UNIQUE,
                                        uniqueMandateReference: 'm-' . $commerceCaseMerchantReference,
                                        creditorId: 'DE98ZZZ09999999999',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            );
            $response = $this->commerceCaseClient->createCommerceCase($this->merchantId, $createCommerceCaseRequest);
            var_dump($response);
            $response2 = $this->orderManagementCheckoutClient->deliverOrder(
                $this->merchantId,
                $response->getCommerceCaseId(),
                $response->getCheckout()->getCheckoutId(),
                new DeliverRequest(deliverType: DeliverType::FULL, isFinal: true),
            );
            var_dump($response2);
        } catch (ApiErrorResponseException $e) {
            fwrite(\STDERR, $e->getTraceAsString() . "\n");
            fwrite(\STDERR, print_r($e->getErrors(), true));
            exit(1);
        }
    }

    public function runApp(): void
    {
        // see: https://docs.payone.com/pcp/checkout-flows/one-step-checkout
        // not that the given reference must be unique and has to renewed after each run
        $this->runSingleStepCheckout('comb1b3');
        // see: https://docs.payone.com/pcp/checkout-flows/step-by-step-checkout
        // not that the given reference must be unique and has to renewed after each run
        $this->runMultistepCheckout('com1a3b');
        // see: https://docs.payone.com/pcp/checkout-flows/step-by-step-checkout
        // creates a checkout and executes the payment in one go
        $this->runCheckoutWithPaymentExecution("com1a3l");

        // Customer Device data must be obtained from client, you can use the static method `deserializeJson` on
        // any client class within the PayoneCommercePlatform\Sdk\ApiClient namespace to convert from a json string to a model class, e.g. CustomerDevice
        $customerDevice = new CustomerDevice(
            deviceToken: 'SOME_TOKEN_FROM_CLIENT',
            ipAddress: 'CLIENT_IP_ADDRESS',
        );
        // see: https://docs.payone.com/pcp/commerce-platform-payment-methods/payone-bnpl/payone-secured-direct-debit
        $this->runMultistepCheckoutForPayoneSecuredDirectDebit('com1a3b', $customerDevice);
        // https://docs.payone.com/pcp/commerce-platform-payment-methods/payone-bnpl/payone-secured-installment
        $this->runMultistepCheckoutForPayoneSecuredInstallment(commerceCaseMerchantReference: 'com1a4b', customerDevice: $customerDevice);

    }

    public static function run(): void
    {
        $app = new DemoApp();
        $app->runApp();
    }
}
DemoApp::run();
