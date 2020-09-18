$('#search-button').on('click', function() {
    cariTagihan()
    $('#search-input').val('')
})

$('#search-input').on('keyup', function(event) {
    if (event.keyCode === 13) {
        cariTagihan()
        $('#search-input').val('')
    }
})

document.getElementById("btnPrint").onclick = function() {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}