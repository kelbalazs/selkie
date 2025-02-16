@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Chocolates</h1>
        <div class="chocolates-list">
            @foreach ($chocolates as $chocolate)
                <div class="chocolate-card" data-chocolate-id="{{ $chocolate['id'] }}">
    <img 
        src="{{ $chocolate['image_url'] }}" 
        alt="{{ $chocolate['name'] }}" 
        class="chocolate-image"
        onerror="this.src='https://via.placeholder.com/100x100?text=No+Image';"
    >
    <h2>{{ $chocolate['name'] }}</h2>
    <p><strong>Price:</strong> £{{ number_format($chocolate['price'], 2) }}</p>

</div>

            @endforeach
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="chocolateModal" tabindex="-1" aria-labelledby="chocolateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chocolateModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalDescription">
                    <!-- Description will be dynamically loaded here -->
                </div>
                <div class="modal-footer">
                <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="addToCartButton" data-chocolate-id="">Add to Cart</button>
</div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .chocolates-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .chocolate-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 200px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background-color: #fff;
            cursor: pointer;
        }

        .chocolate-card h2 {
            font-size: 1.2em;
            margin: 10px 0;
            color: #333;
        }

        .chocolate-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .chocolate-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chocolateModal = document.getElementById('chocolateModal');
        const addToCartButton = document.getElementById('addToCartButton');

        // Event delegation for chocolate cards
        document.querySelector('.chocolates-list').addEventListener('click', function (event) {
            const card = event.target.closest('.chocolate-card');
            if (!card) return;

            const chocolateId = card.dataset.chocolateId;
            const modal = new bootstrap.Modal(chocolateModal);

            // Clear previous content
            document.getElementById('chocolateModalLabel').textContent = 'Loading...';
            document.getElementById('modalDescription').textContent = 'Please wait while we load the details.';
            addToCartButton.setAttribute('data-chocolate-id', ''); // Reset "Add to Cart" button

            // Show modal
            modal.show();

            // Fetch chocolate details
            fetch(`/chocolates/${chocolateId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        document.getElementById('chocolateModalLabel').textContent = 'Error';
                        document.getElementById('modalDescription').textContent = data.error;
                    } else {
                        document.getElementById('chocolateModalLabel').textContent = data.name;
                        document.getElementById('modalDescription').innerHTML = `
                            <img src="${data.image_url}" alt="${data.name}" style="max-width: 100%; height: auto; margin-bottom: 15px;">
                            <p><strong>Description:</strong> ${data.description}</p>
                            <p><strong>Price:</strong> £${data.price.toFixed(2)}</p>
                        `;
                        addToCartButton.setAttribute('data-chocolate-id', chocolateId); // Set chocolate ID for "Add to Cart"
                    }
                })
                .catch(error => {
                    document.getElementById('chocolateModalLabel').textContent = 'Error';
                    document.getElementById('modalDescription').textContent = 'An error occurred while fetching the details.';
                });
        });

        // Event listener for "Add to Cart" button
        addToCartButton.addEventListener('click', function () {
            const chocolateId = addToCartButton.getAttribute('data-chocolate-id');
            if (!chocolateId) {
                alert('No chocolate selected.');
                return;
            }

            fetch(`/cart/add`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for Laravel
                },
                body: JSON.stringify({ chocolate_id: chocolateId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        alert('Chocolate added to cart!');
                        const modal = bootstrap.Modal.getInstance(chocolateModal);
                        modal.hide();
                    }
                })
                .catch(error => {
                    console.error('Error adding to cart:', error);
                    alert('An error occurred. Please try again.');
                });
        });
    });
</script>

@endsection
