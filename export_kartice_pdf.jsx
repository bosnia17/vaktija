var doc = app.activeDocument;

// Trazi text frame "BROJ"
var brojText = null;

for (var i = 0; i < doc.textFrames.length; i++) {
    if (doc.textFrames[i].name == "BROJ") {
        brojText = doc.textFrames[i];
        break;
    }
}

if (brojText == null) {
    alert("Nije pronadjen text frame BROJ");
} else {

    // Zapamti originalni artboard
    var originalAB = doc.artboards[0].artboardRect;

    // Obrisi stare artboardove osim prvog
    while (doc.artboards.length > 1) {
        doc.artboards.remove(doc.artboards[doc.artboards.length - 1]);
    }

    var width = originalAB[2] - originalAB[0];
    var height = originalAB[1] - originalAB[3];

    // Kreiraj artboardove i brojeve
    for (var n = 100; n <= 200; n++) {

        var broj = ("0000" + n).slice(-4);

        // Postavi broj
        brojText.contents = broj;

        // Dupliciraj sve objekte osim za prvi
        if (n > 100) {

            var items = [];

            for (var j = 0; j < doc.pageItems.length; j++) {
                items.push(doc.pageItems[j]);
            }

            for (var k = 0; k < items.length; k++) {
                items[k].duplicate();
            }

            // Novi artboard desno
            var left = (n - 100) * width;

            doc.artboards.add([
                left,
                originalAB[1],
                left + width,
                originalAB[3]
            ]);
        }
    }

    // PDF export
    var pdfFile = File.saveDialog("Sacuvaj PDF", "*.pdf");

    if (pdfFile != null) {

        var pdfOptions = new PDFSaveOptions();

        pdfOptions.preserveEditability = false;
        pdfOptions.compatibility = PDFCompatibility.ACROBAT6;

        doc.saveAs(pdfFile, pdfOptions);

        alert("Gotovo!");
    }
}