<?php
/**
 * File: AuthorFormAdd.php
 * Description: View template that renders the form to add a new author.
 * The form includes fields for name, nationality and birth year and
 * expects POST submission with the keys: 'nom', 'nacionalitat', 'any_naixement'.
 */
?>
<div id="content" class="container-fluid mt-4">
    <div class="container">
        <form method="post" action="">
            <div class="row mb-4">
                <div class="col-12">
                    <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-light">
                        <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-primary">
                            <i class="bi bi-pencil-square me-2"></i>Dades de l'autor
                        </legend>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="nomField" class="form-label fw-semibold label-primary">
                                        <i class="bi bi-person me-1"></i>Nom <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control form-control-md border-2 shadow-sm"
                                        id="nomField"
                                        name="nom"
                                        placeholder="Nom de l'autor"
                                        value="<?php if (isset($content) && $content != NULL) { echo $content->getNom(); } ?>"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="nacionalitatField" class="form-label fw-semibold label-primary">
                                        <i class="bi bi-flag me-1"></i>Nacionalitat <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control form-control-md border-2 shadow-sm"
                                        id="nacionalitatField"
                                        placeholder="Nacionalitat de l'autor"
                                        name="nacionalitat"
                                        value="<?php if (isset($content) && $content != NULL) { echo $content->getNacionalitat(); } ?>"
                                    />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="anyNaixementField" class="form-label fw-semibold label-primary">
                                        <i class="bi bi-calendar me-1"></i>Any de naixement <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control form-control-md border-2 shadow-sm"
                                        id="anyNaixementField"
                                        min="1800"
                                        max="2026"
                                        step="1"
                                        placeholder="Any de naixement de l'autor"
                                        name="any_naixement"
                                        value="<?php if (isset($content) && $content != NULL) { echo $content->getAnyNaixement(); } ?>"
                                    />
                                </div>
                            </div>
                        </div>

                        <p class="text-danger fst-italic small mb-3"><i class="bi bi-info-circle me-1"></i>* Camps obligatoris</p>

                        <button type="submit" name="action" value="add" class="btn btn-clinic-primary btn-lg w-100 shadow fw-semibold">
                            <i class="bi bi-check-circle me-2"></i>Afegir Autor
                        </button>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
