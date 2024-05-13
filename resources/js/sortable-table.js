function sortTable(columnName) {
    var table,
        rows,
        switching,
        i,
        x,
        y,
        shouldSwitch,
        dir,
        switchcount = 0;
    table = document.getElementById("test");
    switching = true;
    dir = "asc";

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < rows.length - 1; i++) {
            shouldSwitch = false;
            x = getFullName(rows[i].getElementsByTagName("td"));
            y = getFullName(rows[i + 1].getElementsByTagName("td"));

            if (dir == "asc") {
                if (x.toLowerCase() > y.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.toLowerCase() < y.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

function getFullName(cells) {
    var fullName = "";
    for (var i = 0; i < cells.length; i++) {
        fullName += cells[i].textContent.trim() + " ";
    }
    return fullName.trim();
}
