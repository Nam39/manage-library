function search() {
  // Logic to fetch data based on selections and display results
  const selectedBooks = Array.from(document.getElementById('book-dropdown').selectedOptions).map(option => option.value);
  // Get selections from other dropdowns similarly

  // Send search request to the server
  fetch('search.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ selectedBooks /* include other selections if needed */ }),
  })
    .then(response => response.json())
    .then(data => {
      // Process search results
      const resultsBody = document.getElementById('results-body');
      resultsBody.innerHTML = '';
      if (data.length > 0) {
        data.forEach((result, index) => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${index + 1}</td>
            <td>${result.book}</td>
            <td>${result.user}</td>
            <td>${result.status}</td>
            <td>${result.daysOverdue}</td>
          `;
          resultsBody.appendChild(row);
        });
        document.getElementById('record-count').textContent = `Số bản ghi tìm thấy: ${data.length}`;
      } else {
        document.getElementById('record-count').textContent = 'Không tìm thấy kết quả.';
      }
    })
    .catch(error => {
      console.error('Lỗi khi tìm kiếm:', error);
      document.getElementById('results-body').innerHTML = '<tr><td colspan="4">Đã xảy ra lỗi khi tìm kiếm.</td></tr>';
      document.getElementById('record-count').textContent = '';
    });
}