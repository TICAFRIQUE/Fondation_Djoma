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
                                <h5 class="modal-title" id="myModalLabel">Créer une nouvelle section À propos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3 needs-validation" method="post" action="{{route('apropos.store')}}" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" name="title" class="form-control" id="title" 
                                            required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="stat_1_value" class="form-label">Stat 1 - Valeur</label>
                                        <input type="text" name="stat_1_value" class="form-control" id="stat_1_value" 
                                            placeholder="+500">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="stat_1_label" class="form-label">Stat 1 - Libellé</label>
                                        <input type="text" name="stat_1_label" class="form-control" id="stat_1_label" 
                                            placeholder="élèves">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="stat_2_value" class="form-label">Stat 2 - Valeur</label>
                                        <input type="text" name="stat_2_value" class="form-control" id="stat_2_value">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="stat_2_label" class="form-label">Stat 2 - Libellé</label>
                                        <input type="text" name="stat_2_label" class="form-control" id="stat_2_label">
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
