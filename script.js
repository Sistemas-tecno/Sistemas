function countByContract() {
    fetch('count.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('countResult').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

