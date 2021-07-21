<header class="head">
    <h2 class="logo">Online Shop</h2>
    <div class="d-flex">
        <form action="index.php" class="mr-3" id="searchBar">
            <div class="input-group">
                <input type="text" class="form-control" name="search" id="searchInput">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary">Search</button>
                </div>
            </div>
        </form>
        <form action="index.php">
            <select name="category" id="category" class="form-control">
                <option value="" selected>All</option>
                <option value="mobile">Mobile</option>
                <option value="Something">Something</option>
                <option value="test">Test</option>
            </select>
        </form>
    </div>
    <?php if (isset($_SESSION['name'])) : ?>
        <a href="../processes/logout.php" class="btn btn-danger">Logout</a>
    <?php else: ?>
        <a href="../views/loginForm.php" class="btn btn-outline-dark">Login</a>
    <?php endif; ?>
</header>
