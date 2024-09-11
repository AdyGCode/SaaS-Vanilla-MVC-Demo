// Initialize SimpleMDE
var simplemde = new SimpleMDE({
    element: document.getElementById("Description"),
    spellChecker: false,
    autofocus: true,
    autosave: {
        enabled: true,
        uniqueId: "Description",
        delay: 1000,
    },
});

