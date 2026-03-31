<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <!-- Default Modals -->
            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
                style="display: none;">
                <div class="modal-lg">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Créer un nouveau slider</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">

                                <form class="row g-3 needs-validation" method="post" action="{{route('sliders.store')}}" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" name="title" class="form-control" id="title" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="highlight" class="form-label">Texte highlight</label>
                                        <input type="text" name="highlight" class="form-control" id="highlight" placeholder="Texte en évidence">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="btn1_text" class="form-label">Bouton 1 - Texte</label>
                                        <input type="text" name="btn1_text" class="form-control" id="btn1_text" placeholder="Texte du bouton">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="btn1_link" class="form-label">Bouton 1 - Lien</label>
                                        <input type="text" name="btn1_link" class="form-control" id="btn1_link" placeholder="URL du lien">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="btn2_text" class="form-label">Bouton 2 - Texte</label>
                                        <input type="text" name="btn2_text" class="form-control" id="btn2_text" placeholder="Texte du bouton">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="btn2_link" class="form-label">Bouton 2 - Lien</label>
                                        <input type="text" name="btn2_link" class="form-control" id="btn2_link" placeholder="URL du lien">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="order" class="form-label">Ordre</label>
                                        <input type="number" name="order" class="form-control" id="order" placeholder="0">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="is_active" class="form-label">Statut</label>
                                        <select name="is_active" class="form-control" id="is_active">
                                            <option value="1">Actif</option>
                                            <option value="0">Inactif</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                    </div>

                                    <div class="modal-footer mt-3">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Créer</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div><!-- /.modal -->
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->
</div>
<!--end row-->
