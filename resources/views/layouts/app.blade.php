<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selkie Chocolate Website</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
<body>
    <!-- Announcement Bar -->
    <div class="announcement-bar py-2 text-center">
        <small>🍫 Free shipping on orders over £50! Use code: SWEETDEAL</small>
    </div>

    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <!-- Logo and Brand Name -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="images/logos/Selkie Logo.png" alt="Selkie Chocolates" style="height: 60px; margin-right: 10px;">
            Selkie Chocolates
        </a>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/chocolates">Our Collections</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">Our Story</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
            
            <!-- Search and Cart -->
            <div class="d-flex align-items-center">
                <a class="nav-link me-3" href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="fas fa-search search-icon"></i>
                </a>
                <div class="cart-container">
                    <a class="cart-icon" href="{{ route('cart.view') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-text">Cart</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>


    <!-- Main Content -->
    <main>
        <div class="container mt-4">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">About Selkie Chocolates</h5>
                    <p>Crafting extraordinary chocolate experiences with the finest ingredients and artisanal techniques since 2020.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/faq" class="text-white">FAQ</a></li>
                        <li><a href="/shipping" class="text-white">Shipping Information</a></li>
                        <li><a href="/returns" class="text-white">Returns Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Stay Connected</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </div>
                    <div class="mt-3">
                        <small>Sign up for our newsletter to receive updates and exclusive offers!</small>
                        <form class="mt-2">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email">
                                <button class="btn btn-newsletter" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4 border-light">
            <div class="row">
                <div class="col-12 text-center">
                    <small>&copy; 2025 Selkie Chocolates. All rights reserved.</small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search our chocolates...">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>