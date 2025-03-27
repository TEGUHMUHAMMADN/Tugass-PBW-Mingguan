function cekNilai() {
    let nim = document.getElementById("nim").value.trim(); 
    let nilai = parseFloat(document.getElementById("nilai").value);
    let output = document.getElementById("output");

    if (nim === "") {
        output.innerHTML = "NIM tidak boleh kosong!";
        output.style.color = "red";
        return;
    }

    if (isNaN(nilai) || nilai < 0 || nilai > 100) {
        output.innerHTML = `NIM: ${nim}<br>Nilai: ${nilai}<br><span style="color: red;">Nilai tidak valid!</span>`;
    } else {
        let hurufMutu;
        if (nilai >= 80) {
            hurufMutu = "A";
        } else if (nilai >= 70) {
            hurufMutu = "B";
        } else if (nilai >= 60) {
            hurufMutu = "C";
        } else if (nilai >= 50) {
            hurufMutu = "D";
        } else {
            hurufMutu = "E";
        }
        output.innerHTML = `NIM: ${nim}<br>Nilai: ${nilai}<br>Huruf Mutu: ${hurufMutu}`;
        output.style.color = "black";
    }
}