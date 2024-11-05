<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel-like Input Table with Merged Cells</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #ddd;
            padding: 8px;
            position: relative;
        }
        input {
            width: 100%;
            border: none;
            padding: 8px;
            box-sizing: border-box;
        }
        input:focus {
            outline: 2px solid blue;
        }
        button {
            margin: 10px 0;
            padding: 10px;
        }
    </style>
</head>
<body>

<button id="addRowButton">Tambah Baris</button>

<table id="dataTable">
    <tr>
        <th>Kode Buku</th>
        <th>No.</th>
        <th>No. Halaman</th>
        <th>No. Konten</th>
        <th>No. Halaman</th>
        <th>Ekstensi Konten</th>
    </tr>
    <tr>
        <td><input type="text" value=""></td>
        <td><input type="text" value=""></td>
        <td><input type="text" value=""></td>
        <td><input type="text" value=""></td>
        <td><input type="text" value=""></td>
        <td><input type="text" value=""></td>
    </tr>
</table>

<script>
    const addRowButton = document.getElementById('addRowButton');
    const dataTable = document.getElementById('dataTable');

    addRowButton.addEventListener('click', () => {
        // Membuat baris baru
        const newRow = document.createElement('tr');
        
        // Menambahkan kolom baru dengan input
        for (let i = 0; i < 6; i++) {
            const newCell = document.createElement('td');
            const input = document.createElement('input');
            input.type = 'text';
            newCell.appendChild(input);
            newRow.appendChild(newCell);
        }

        // Menambahkan baris baru ke tabel
        dataTable.appendChild(newRow);
    });

    // Menambahkan event listener untuk input navigasi
    dataTable.addEventListener('keydown', (e) => {
        const inputs = dataTable.querySelectorAll('input');
        const totalColumns = 6; // Jumlah kolom di tabel

        inputs.forEach((input, index) => {
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === 'Tab') {
                    e.preventDefault();
                    const nextInput = inputs[index + 1];
                    if (nextInput) {
                        nextInput.focus();
                        nextInput.setSelectionRange(nextInput.value.length, nextInput.value.length);
                    }
                } else if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    const prevInput = inputs[index - 1];
                    if (prevInput) {
                        prevInput.focus();
                        prevInput.setSelectionRange(prevInput.value.length, prevInput.value.length);
                    }
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    const nextInput = inputs[index + 1];
                    if (nextInput) {
                        nextInput.focus();
                        nextInput.setSelectionRange(nextInput.value.length, nextInput.value.length);
                    }
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    const currentRow = Math.floor(index / totalColumns);
                    const targetRowIndex = currentRow > 0 ? (currentRow - 1) * totalColumns + (index % totalColumns) : -1;
                    const targetInput = inputs[targetRowIndex];
                    if (targetInput) {
                        targetInput.focus();
                        targetInput.setSelectionRange(targetInput.value.length, targetInput.value.length);
                    }
                } else if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    const currentRow = Math.floor(index / totalColumns);
                    const totalRows = Math.ceil(inputs.length / totalColumns);
                    const targetRowIndex = currentRow < totalRows - 1 ? (currentRow + 1) * totalColumns + (index % totalColumns) : -1;
                    const targetInput = inputs[targetRowIndex];
                    if (targetInput) {
                        targetInput.focus();
                        targetInput.setSelectionRange(targetInput.value.length, targetInput.value.length);
                    }
                }
            });
        });
    });
</script>

</body>
</html>