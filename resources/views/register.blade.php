@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row w-75 shadow-lg rounded">
            <!-- Columna izquierda con imagen -->
            <div class="col-md-6 d-flex align-items-center justify-content-center"
                style="background-color: #262626; padding: 20px;">
                <img src="{{ asset('images/Ponente.png') }}" alt="Registro" class="img-fluid rounded shadow-lg"
                    style="max-height: 400px; object-fit: cover;">
            </div>

            <!-- Columna derecha con formulario -->
            <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
                <!-- Paso 1 -->
                <div id="step1" class="fade-in">
                    <h2 class="text-center" style="color: #051726;">Vamos a crear tu cuenta</h2>
                    <p class="text-center" style="color: #464A8C;">Regístrate en nuestro webinar llenando el formulario.</p>

                    <form id="registerForm">
                        @csrf
                        <div class="mb-3">
                            <label for="first_name">Nombre</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Apellidos</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Número de Celular (WhatsApp)</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="stage" class="form-label">¿En qué etapa estás?</label>
                            <select name="stage" id="stage" class="form-control" required>
                                <option value="Tengo un emprendimiento">Tengo un emprendimiento</option>
                                <option value="Tengo una idea">Tengo una idea</option>
                                <option value="No tengo una idea">No tengo una idea</option>
                            </select>
                        </div>
                        <div class="text-center"><br>
                            <button type="button" class="btn btn-lg" style="background-color: #ed8a1f; color: white;"
                                onclick="validateEmail()">Registrarme</button>
                        </div>
                    </form>
                </div>

                <!-- Paso 2 - Pago con PayPal -->
                <div id="step2" class="fade-out" style="display: none;">
                    <h4 class="text-center" style="color: #051726;">Completa tu registro</h2><br>

                        <!-- Tarjeta de Resumen del Producto -->
                        <div class="card mb-4 shadow-sm mx-auto"
                            style="border-radius: 12px; padding: 1px; background-color: #fff; max-width: 400px;">
                            <div class="card-body">
                                <h6 class="card-title text-center fw-bold">Webinar de Emprendimiento</h6>
                                <ul class="list-group list-group-flush text-left">
                                    <li class="list-group-item"><strong>🎤 Ponente:</strong> Dr. César Lozano</li>
                                    <li class="list-group-item"><strong>📅 Fecha:</strong> 28 de marzo de 2025</li>
                                    <li class="list-group-item"><strong>⌚ Hora:</strong> 7:00 PM - 10:00 PM</li>
                                    <li class="list-group-item"><strong>📍 Modalidad:</strong> Online (Zoom)</li>
                                    <li class="list-group-item"><strong>💲 Precio:</strong> 100.00 MXN</li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center">
                            <!-- Botón de PayPal -->
                            <div id="paypal-button-container"></div>
                        </div>
                </div>

                <script
                    src="https://www.paypal.com/sdk/js?client-id=AdeBl0mAJLAh2VnMXcB6-71gKE5G_rvBj0C_WrrseoEAv7ph_0FSbTxrgfSMFgNxi3fC6LDfK5pqEksp&currency=USD">
                </script>

                <script>
                    function nextStep() {
                        let step1 = document.getElementById("step1");
                        let step2 = document.getElementById("step2");

                        // Aplicar efecto de fade-out al paso 1
                        step1.classList.remove("fade-in");
                        step1.classList.add("fade-out");

                        setTimeout(() => {
                            step1.style.display = "none";
                            step2.style.display = "block";
                            step2.classList.remove("fade-out");
                            step2.classList.add("fade-in");
                        }, 500);

                        paypal.Buttons({
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '100.00' // Ajusta el precio según el webinar
                                        }
                                    }]
                                });
                            },
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    console.log("Detalles de la transacción:", details);

                                    let paymentData = {
                                        first_name: document.getElementById("first_name").value,
                                        last_name: document.getElementById("last_name").value,
                                        email: document.getElementById("email").value,
                                        phone: document.getElementById("phone").value, 
                                        stage: document.getElementById("stage").value,
                                        transaction_id: details.id,
                                        amount: details.purchase_units[0].amount.value,
                                        _token: "{{ csrf_token() }}"
                                    };

                                    fetch("{{ route('payment.process') }}", {
                                            method: "POST",
                                            headers: {
                                                "Content-Type": "application/json",
                                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                            },
                                            body: JSON.stringify(paymentData)
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.error) {
                                                Swal.fire({
                                                    title: 'Error',
                                                    text: data.error,
                                                    icon: 'error',
                                                    confirmButtonText: 'Aceptar'
                                                });
                                            } else {
                                                Swal.fire({
                                                    title: 'Pago exitoso!',
                                                    text: 'Tu registro ha sido confirmado. Te llegará un correo con los detalles.',
                                                    icon: 'success',
                                                    confirmButtonText: 'Aceptar'
                                                }).then(() => {
                                                    window.location.href =
                                                        "{{ route('landing.welcome') }}";
                                                });
                                            }
                                        })
                                        .catch(error => {
                                            console.error("Error al procesar el pago:", error);
                                            Swal.fire("Error", "Hubo un problema al registrar el pago.",
                                                "error");
                                        });
                                });
                            }
                        }).render('#paypal-button-container');
                    }

                    function validateEmail() {
                        let email = document.getElementById("email").value;

                        if (!email) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Por favor, ingresa tu correo electrónico.',
                                icon: 'warning',
                                confirmButtonText: 'Aceptar'
                            });
                            return;
                        }

                        fetch("{{ route('validate.email') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    email: email
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.exists) {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'El correo ya está en uso. Por favor, usa otro.',
                                        icon: 'error',
                                        confirmButtonText: 'Aceptar'
                                    });
                                } else {
                                    nextStep();
                                }
                            });
                    }
                </script>

                <style>
                    .fade-in {
                        animation: fadeIn 0.5s ease-in;
                    }

                    .fade-out {
                        animation: fadeOut 0.5s ease-out;
                    }

                    @keyframes fadeIn {
                        from {
                            opacity: 0;
                        }

                        to {
                            opacity: 1;
                        }
                    }

                    @keyframes fadeOut {
                        from {
                            opacity: 1;
                        }

                        to {
                            opacity: 0;
                        }
                    }
                </style>
            </div>
        </div>
    </div>
@endsection
