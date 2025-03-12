// Your custom JavaScript here

document.getElementById('searchIcon').addEventListener('click', function(e) {
    e.preventDefault();
    var searchForm = document.getElementById('searchForm');
    if (searchForm.style.display === 'none' || searchForm.style.display === '') {
        searchForm.style.display = 'block';
    } else {
        searchForm.style.display = 'none';
    }
});

document.getElementById('searchIcon').addEventListener('click', function(e) {
        e.preventDefault();
        var searchForm = document.getElementById('searchForm');
        if (searchForm.classList.contains('show')) {
            searchForm.classList.remove('show');
        } else {
            searchForm.classList.add('show');
        }
    });

    /* Toggle between showing and hiding the navigation menu links when the user clicks on the
				hamburger menu / bar icon */
              /*  function toggleMenu() {
                    var x = document.getElementById("navbarSupportedContent");
                    if (x.classList.contains("show")) {
                        x.classList.remove("show");
                    } else {
                        x.classList.add("show");
                    }
                }*/
                // Toggle navbar visibility
    document.querySelector('.navbar-toggler').addEventListener('click', function() {
        var navbar = document.getElementById('navbarSupportedContent');
        navbar.classList.toggle('show');
    });
            
                document.getElementById('searchIcon').addEventListener('click', function(e) {
                    e.preventDefault();
                    var searchForm = document.getElementById('searchForm');
                    if (searchForm.classList.contains('show')) {
                        searchForm.classList.remove('show');
                    } else {
                        searchForm.classList.add('show');
                    }
                });