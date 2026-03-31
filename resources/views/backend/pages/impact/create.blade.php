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
                                <h5 class="modal-title" id="myModalLabel">Créer un nouvel impact</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">

                                <form class="row g-3 needs-validation" method="post" action="{{route('impacts.store')}}" novalidate>
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="value" class="form-label">Valeur</label>
                                        <input type="text" name="value" class="form-control" id="value" 
                                            placeholder="+500" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="label" class="form-label">Libellé</label>
                                        <input type="text" name="label" class="form-control" id="label" 
                                            placeholder="Texte" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
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

                                    <div class="modal-footer mt-3">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary ">Créer</button>
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
