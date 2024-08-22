const fs = require("fs");

const customTransform = (commit, context) => {
  const transformedCommit = { ...commit };

  switch (transformedCommit.type) {
    case "feat":
      transformedCommit.customGroup = "Features";
      break;
    case "feature":
      transformedCommit.customGroup = "Features";
      break;
    case "fix":
      transformedCommit.customGroup = "Bug Fixes";
      break;
    case "docs":
      transformedCommit.customGroup = "Documentation";
      break;
    default:
      transformedCommit.customGroup = null;
  }

  return transformedCommit;
};

module.exports = {
  writerOpts: {
    transform: customTransform,
    groupBy: "customGroup",
    commitGroupsSort: "title",
    commitsSort: ["scope", "subject"],
    mainTemplate: `{{> header}}
{{#each commitGroups}}
{{#if title}}
### {{title}}
{{#each commits}}
{{> commit root=@root}}
{{/each}}
{{/if}}
{{/each}}
{{> footer}}
`,
    headerPartial: `{{#if isPatch~}}
  ##
{{~else~}}
  #
{{~/if}} {{#if @root.linkCompare~}}
  [{{version}}](
  {{~#if @root.repository~}}
    {{~#if @root.host}}
      {{~@root.host}}/
    {{~/if}}
    {{~#if @root.owner}}
      {{~@root.owner}}/
    {{~/if}}
    {{~@root.repository}}
  {{~else}}
    {{~@root.repoUrl}}
  {{~/if~}}
  /compare/{{previousTag}}...{{currentTag}})
{{~else}}
  {{~version}}
{{~/if}}
{{~#if title}} "{{title}}"
{{~/if}}
{{~#if date}} ({{date}})
{{/if}}
`,
  },
  hooks: {
    postbump: () => {
      const path = "CHANGELOG.md";
      if (!fs.existsSync(path)) {
        fs.writeFileSync(path, "", "utf8");
      }
    },
  },
};
