<?php
/**
 * File: HomePage.php
 * Description: Home page view displaying welcome message and system features overview.
 * Shows cards for author management, author and book search, and book listing.
 */
?>
<div class="container-fluid mt-4">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="text-center py-5 px-4 rounded-3 shadow-sm hero-section">
                    <i class="bi bi-book hero-icon"></i>
                    <h1 class="mt-3 mb-3 fw-bold text-white">Benvingut a la Biblioteca Provençana</h1>
                    <p class="lead text-white mb-0">Sistema de Gestió d'Autors i Llibres</p>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-border-primary">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-people-fill card-icon icon-primary"></i>
                        <h5 class="card-title mt-3 mb-3 fw-bold title-primary">Gestió d'Autors</h5>
                        <p class="card-text text-muted">Consulta, afegeix i gestiona la informació dels autors registrats al sistema.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-border-orange">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-search card-icon icon-orange"></i>
                        <h5 class="card-title mt-3 mb-3 fw-bold title-orange">Cerca d'Autors i Llibres</h5>
                        <p class="card-text text-muted">Troba tots els autors i els seus llibres registrats al sistema de manera ràpida i eficient.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-border-light">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-book card-icon icon-light"></i>
                        <h5 class="card-title mt-3 mb-3 fw-bold title-light">Llistat de Llibres</h5>
                        <p class="card-text text-muted">Consulta la llista de llibres disponibles a la biblioteca.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="alert border-0 shadow-sm info-alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle-fill me-3 info-icon"></i>
                        <div>
                            <h6 class="mb-1 fw-bold">Com començar?</h6>
                            <p class="mb-0">Utilitza el menú superior <strong>"Autors"</strong> o <strong>"Llibres"</strong> per accedir a les diferents funcionalitats de gestió del sistema.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>