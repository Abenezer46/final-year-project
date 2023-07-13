<!-- HTML code to create a form with an input field and a table -->
<form>
  <label for="myInput">Search:</label>
  <input type="text" id="myInput" name="myInput">
  <button type="submit">Submit</button>
</form>

<table id="myTable">
  <thead>
    <tr>
      <th>Name</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John</td>
      <td>13/07/2023 12:54:43 pm</td>
    </tr>
    <tr>
      <td>Jane</td>
      <td>10/07/2023 09:23:15 am</td>
    </tr>
    <tr>
      <td>Bob</td>
      <td>22/06/2023 03:45:28 pm</td>
    </tr>
  </tbody>
</table>

<script>
  // JavaScript code to filter the table based on user input
  const searchInput = document.getElementById("myInput");
  const tableRows = document.getElementById("myTable").getElementsByTagName("tr");

  searchInput.addEventListener("input", function() {
    const filter = searchInput.value.toLowerCase();
    for (let i = 1; i < tableRows.length; i++) {
      const cells = tableRows[i].getElementsByTagName("td");
      let match = false;
      for (let j = 0; j < cells.length; j++) {
        const cellText = cells[j].textContent.toLowerCase();
        if (cellText.includes(filter)) {
          match = true;
          break;
        }
      }
      tableRows[i].style.display = match ? "" : "none";
    }
  });

  // JavaScript code to filter the table based on date range
  const now = new Date();
  const currentWeekStart = new Date(now.getFullYear(), now.getMonth(), now.getDate() - now.getDay() + 1); // Start of current week
  const currentMonthStart = new Date(now.getFullYear(), now.getMonth(), 1); // Start of current month
  const rows = document.querySelectorAll("#myTable tbody tr");

  function filterRows(filter) {
    for (let i = 0; i < rows.length; i++) {
      const dateStr = rows[i].querySelector("td:nth-of-type(2)").textContent;
      const dateParts = dateStr.split(" ");
      const datePart = dateParts[0].split("/");
      const timePart = dateParts[1];
      const amPmPart = dateParts[2];
      const formattedDate = `${datePart[1]}/${datePart[0]}/${datePart[2]} ${timePart} ${amPmPart}`;
      const date = new Date(formattedDate);
      if (filter === "week" && date >= currentWeekStart && date <= now) {
        rows[i].style.display = "";
      } else if (filter === "month" && date >= currentMonthStart && date <= now) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  }

  searchInput.addEventListener("input", function() {
    const filter = searchInput.value.toLowerCase();
    if (filter === "week" || filter === "month") {
      filterRows(filter);
    } else {
      for (let i = 1; i < tableRows.length; i++) {
        const cells = tableRows[i].getElementsByTagName("td");
        let match = false;
        for (let j = 0; j < cells.length; j++) {
          const cellText = cells[j].textContent.toLowerCase();
          if (cellText.includes(filter)) {
            match = true;
            break;
          }
        }
        tableRows[i].style.display = match ? "" : "none";
      }
    }
  });
</script>