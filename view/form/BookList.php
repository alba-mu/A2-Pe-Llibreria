<?php
/**
 * File: BookList.php
 * Description: Displays a table listing all registered books.
 * Shows book ID, ISBN, title, publication year and author id.
 */
?>
<div id="content" class="container-fluid mt-4">
    <div class="container">
        <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-primary">
            <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-large">
                <i class="bi bi-book me-2"></i>Llistat de Llibres
            </legend>

            <?php
                if (isset($content) && !empty($content)) {
                    echo <<<EOT
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless align-middle mb-0 shadow-sm table-clinic">
                                <thead>
                                    <tr>
                                        <th class="py-3"><i class="bi bi-hash me-1"></i>Id</th>
                                        <th class="py-3"><i class="bi bi-upc-scan me-1"></i>ISBN</th>
                                        <th class="py-3"><i class="bi bi-book me-1"></i>Títol</th>
                                        <th class="py-3"><i class="bi bi-calendar3 me-1"></i>Any de publicació</th>
                                        <th class="py-3"><i class="bi bi-person me-1"></i>Id d'Autor</th>
                                    </tr>
                                </thead>
                                <tbody>
EOT;
                    foreach ($content as $book) {
                        echo <<<EOT
                                    <tr>
                                        <td class="py-3 fw-semibold cell-id">{$book->getId()}</td>
                                        <td class="py-3">{$book->getIsbn()}</td>
                                        <td class="py-3">{$book->getTitol()}</td>
                                        <td class="py-3">{$book->getAny_publicacio()}</td>
                                        <td class="py-3">{$book->getAutorId()}</td>
                                    </tr>
EOT;
                    }
                    echo <<<EOT
                                </tbody>
                            </table>
                        </div>
EOT;
                } else {
                    echo '<div class="alert border-0 shadow-sm text-center alert-clinic-info">
                            <i class="bi bi-info-circle me-2" style="font-size: 1.5rem;"></i>
                            <p class="mb-0">No hi ha propietaris registrats.</p>
                          </div>';
                }
            ?>
        </fieldset>
    </div>
</div>