// Initialize SimpleMDE
var simplemde = new SimpleMDE({
    element: document.getElementById("Description"),
    spellChecker: false,
    autofocus: true,
    indentWithTabs: true,
    renderingConfig: {
        singleLineBreaks: true,
    },
    autosave: {
        enabled: true,
        uniqueId: "Description",
        delay: 1000,
    },
});
