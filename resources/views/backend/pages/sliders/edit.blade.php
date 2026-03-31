<div id="myModalEdit{{ $item['id'] }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
     <div class="modal-lg">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modification du slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">

                    <form class="row g-3 needs-validation" method="post"
                        action="{{ route('sliders.update', $item['id']) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="col-md-12">
                            <label for="title{{ $item['id'] }}" class="form-label">Titre</label>
                            <input type="text" name="title" value="{{ $item['title'] }}" class="form-control"
                                id="title{{ $item['id'] }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="highlight{{ $item['id'] }}" class="form-label">Texte highlight</label>
                            <input type="text" name="highlight" value="{{ $item['highlight'] ?? '' }}" class="form-control" id="highlight{{ $item['id'] }}" placeholder="Texte en évidence">
                        </div>

                        <div class="col-md-12">
                            <label for="description{{ $item['id'] }}" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description{{ $item['id'] }}" rows="3">{{ $item['description'] ?? '' }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="btn1_text{{ $item['id'] }}" class="form-label">Bouton 1 - Texte</label>
                            <input type="text" name="btn1_text" value="{{ $item['btn1_text'] ?? '' }}" class="form-control" id="btn1_text{{ $item['id'] }}" placeholder="Texte du bouton">
                        </div>

                        <div class="col-md-6">
                            <label for="btn1_link{{ $item['id'] }}" class="form-label">Bouton 1 - Lien</label>
                            <input type="text" name="btn1_link" value="{{ $item['btn1_link'] ?? '' }}" class="form-control" id="btn1_link{{ $item['id'] }}" placeholder="URL du lien">
                        </div>

                        <div class="col-md-6">
                            <label for="btn2_text{{ $item['id'] }}" class="form-label">Bouton 2 - Texte</label>
                            <input type="text" name="btn2_text" value="{{ $item['btn2_text'] ?? '' }}" class="form-control" id="btn2_text{{ $item['id'] }}" placeholder="Texte du bouton">
                        </div>

                        <div class="col-md-6">
                            <label for="btn2_link{{ $item['id'] }}" class="form-label">Bouton 2 - Lien</label>
                            <input type="text" name="btn2_link" value="{{ $item['btn2_link'] ?? '' }}" class="form-control" id="btn2_link{{ $item['id'] }}" placeholder="URL du lien">
                        </div>

                        <div class="col-md-6">
                            <label for="order{{ $item['id'] }}" class="form-label">Ordre</label>
                            <input type="number" name="order" value="{{ $item['order'] ?? '' }}" class="form-control" id="order{{ $item['id'] }}">
                        </div>

                        <div class="col-md-6">
                            <label for="is_active{{ $item['id'] }}" class="form-label">Statut</label>
                            <select name="is_active" class="form-control" id="is_active{{ $item['id'] }}">
                                <option value="1" {{ $item['is_active'] ? 'selected' : '' }}>Actif</option>
                                <option value="0" {{ !$item['is_active'] ? 'selected' : '' }}>Inactif</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="image{{ $item['id'] }}" class="form-label">Image</label>
                            @if($item['image'])
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['title'] }}" style="max-width: 150px; height: auto;">
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control" id="image{{ $item['id'] }}" accept="image/*">
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
