document.getElementById('searchForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const searchInput = document.getElementById('searchInput').value;
    window.location.href = 'result.php?id=' + encodeURIComponent(searchInput);
});