
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Responsive extension -->
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
@yield('scripts')
<!-- <script>
$(document).ready(function() {
    $('#employeesTable').DataTable({
        responsive: true,  // makes it mobile-friendly
        pageLength: 10,    // optional: number of rows per page
        lengthChange: true,
        searching: true,
        ordering: true,
    });
});
</script> -->
<script>
/* MENU DROPDOWN */
document.querySelectorAll('.menu > li > a').forEach((menu) => {
  menu.addEventListener('click', function (e) {
    let submenu = this.nextElementSibling;
    if (submenu) {
      e.preventDefault();
      submenu.classList.toggle('open');
      let arrow = this.querySelector('.arrow');
      if (arrow) {
        arrow.classList.toggle('rotate');
      }
    }
  });
});

/* DARK LIGHT MODE */
function toggleMode() {
  document.body.classList.toggle('dark');
}

/* DATE TIME */
function updateTime() {
  const now = new Date();
  document.getElementById('datetime').innerHTML =
    now.toLocaleDateString() + ' ' + now.toLocaleTimeString();
}
setInterval(updateTime, 1000);
updateTime();

/* SIDEBAR TOGGLE MOBILE */
const sidebar = document.getElementById('sidebar');
const menuToggle = document.getElementById('menu-toggle');

menuToggle.addEventListener('click', () => {
  sidebar.classList.toggle('active');
});

/* CLOSE SIDEBAR WHEN CLICKING OUTSIDE */
document.addEventListener('click', function (e) {
  const overlay = document.getElementById('overlay');
  if (
    sidebar.classList.contains('active') &&
    !sidebar.contains(e.target) &&
    !menuToggle.contains(e.target)
  ) {
    sidebar.classList.remove('active');
  }
});
</script>

</body>
</html>