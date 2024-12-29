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
    
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #fdfbf9;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #3c1518 !important;
        }
        
        .nav-link {
            color: #5c2a2d !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: #8b4513 !important;
        }
        
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            background-color: #fff !important;
            padding: 1rem 2rem;
        }
        
        .cart-container {
            position: relative;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        
        .cart-container:hover {
            background-color: rgba(139, 69, 19, 0.1);
        }
        
        .cart-icon {
            display: flex;
            align-items: center;
            color: #5c2a2d !important;
            text-decoration: none;
        }
        
        .cart-icon i {
            font-size: 1.3rem;
            margin-right: 8px;
        }
        
        .cart-text {
            font-size: 0.9rem;
            margin-right: 4px;
        }
        
        .cart-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #8b4513;
            color: white;
            border-radius: 50%;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            transform: translate(25%, -25%);
        }
        
        footer {
            background-color: #3c1518;
            color: #fff;
            padding: 3rem 0;
            margin-top: 4rem;
        }
        
        .social-icons a {
            color: #fff;
            margin: 0 10px;
            font-size: 1.5rem;
            transition: opacity 0.3s ease;
        }
        
        .social-icons a:hover {
            opacity: 0.8;
        }

        .footer a {
            text-decoration: none;
            transition: opacity 0.3s ease;
        }

        .footer a:hover {
            opacity: 0.8;
        }

        .announcement-bar {
            background-color: #f8e5b9;
            border-bottom: 1px solid #e9d5a7;
        }

        .search-icon {
            font-size: 1.2rem;
            color: #5c2a2d;
            transition: color 0.3s ease;
        }

        .search-icon:hover {
            color: #8b4513;
        }

        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .btn-newsletter {
            background-color: #8b4513;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-newsletter:hover {
            background-color: #6b3410;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Announcement Bar -->
    <div class="announcement-bar py-2 text-center">
        <small>🍫 Free shipping on orders over $50! Use code: SWEETDEAL</small>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                Selkie Chocolates
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
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
                    <small>&copy; 2024 Selkie Chocolates. All rights reserved.</small>
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