<header>
  <nav style="background-color: #a8d5ba; padding: 15px;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
      <h2 style="margin: 0; color: #14532d;">🌿 Fertilizer Shop</h2>
      <ul style="list-style: none; display: flex; gap: 20px; margin: 0;">
        <li><a href="index.php">Home</a></li>
        <li><a href="products/view.php">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="user/login.php">User Login</a></li>
        <li><a href="admin/index.php">Admin Login</a></li>
      </ul>
    </div>
  </nav>
</header>

<style>
  nav a {
    text-decoration: none;
    color: #14532d;
    font-weight: bold;
  }

  nav a:hover {
    color: #0d4b26;
  }

  @media (max-width: 768px) {
    nav ul {
      flex-direction: column;
      align-items: flex-start;
    }
  }
</style>
