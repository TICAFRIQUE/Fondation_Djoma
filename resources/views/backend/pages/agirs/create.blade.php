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
                                <h5 class="modal-title" id="myModalLabel">Créer une nouvelle action</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">

                                <form class="row g-3 needs-validation" method="post" action="{{route('agirs.store')}}" novalidate>
                                    @csrf

                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" name="title" class="form-control" id="title" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="type" class="form-label">Type</label>
                                        <select name="type" class="form-control" id="type" required>
                                            <option value="donation">Don</option>
                                            <option value="sponsorship">Parrainage</option>
                                            <option value="volunteer">Bénévole</option>
                                            <option value="partner">Partenaire</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="icon" class="form-label">Icône (Emoji ou HTML)</label>
                                        <input type="text" name="icon" class="form-control" id="icon" placeholder="💰 ou &lt;i class='bi bi-heart'&gt;">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="color" class="form-label">Couleur de fond</label>
                                        <input type="color" name="color" class="form-control" id="color" value="#FFF3E0">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="order" class="form-label">Ordre</label>
                                        <input type="number" name="order" class="form-control" id="order" placeholder="0" value="0">
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