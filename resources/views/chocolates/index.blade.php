@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Chocolates</h1>
        <div class="chocolates-list">
            @foreach ($chocolates as $chocolate)
                <div class="chocolate-card" data-chocolate-id="{{ $chocolate->id }}">
                    <h2>{{ $chocolate->name }}</h2>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .chocolates-list {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            justify-content: center;
            margin-top: 20px;
        }

        .chocolate-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 200px;
            padding: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background-color: #fff;
            cursor: pointer;
        }

        .chocolate-card h2 {
            font-size: 1.2em;
            margin: 0;
            color: #333;
        }

        .chocolate-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event delegation for chocolate cards
            document.querySelector('.chocolates-list').addEventListener('click', function(event) {
                const card = event.target.closest('.chocolate-card');
                if (!card) return;

                const chocolateId = card.dataset.chocolateId;
                const modal = new bootstrap.Modal(document.getElementById('chocolateModal'));
                
                // Clear previous content
                document.getElementById('chocolateModalLabel').textContent = 'Loading...';
                document.getElementById('modalDescription').textContent = 'Please wait while we load the details.';
                
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
                                <p><strong>Description:</strong> ${data.description}</p>
                                <p><strong>Price:</strong> $${data.price}</p>
                            `;
                        }
                    })
                    .catch(error => {
                        document.getElementById('chocolateModalLabel').textContent = 'Error';
                        document.getElementById('modalDescription').textContent = 'An error occurred while fetching the details.';
                    });
            });
        });
    </script>
@endsection