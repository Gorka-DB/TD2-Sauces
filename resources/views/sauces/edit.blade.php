<div>
    @extends("sauces.layout")
    @section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header h3">Modifier la sauce</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('sauces.update', $sauce->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $sauce->name }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong> //signaler l'erreur jsp
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="manufacturer" class="col-md-4 col-form-label text-md-right">Manufacturer</label>

                                <div class="col-md-6">
                                    <input id="manufacturer" type="text" class="form-control @error('manufacturer') is-invalid @enderror" name="manufacturer" value="{{ $sauce->manufacturer }}">

                                    @error('manufacturer')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong> //signaler l'erreur jsp
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea rows=10 id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description">{{ $sauce->description }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mainPepper" class="col-md-4 col-form-label text-md-right">Main Pepper Ingredient</label>

                                <div class="col-md-6">
                                    <input id="mainPepper" type="text" class="form-control @error('mainPepper') is-invalid @enderror" name="mainPepper" value="{{ $sauce->mainPepper }}">

                                    @error('mainPepper')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong> //signaler l'erreur jsp
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="imageUrl" class="col-md-4 col-form-label text-md-right">Image</label>



                                <div class="col-md-6">{{--                                        bouton changer l'image--}}
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <img id="currentImagePreview" src="{{ $sauce->imageUrl }}" alt="Current Image" class="img-thumbnail mb-2" style="max-width: 150px;">
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#imageModal">
                                                    {{ $sauce->imageUrl ? 'Change image' : 'Add an image' }}
                                                </button>
                                            </div>
                                        </div>
                                        <input id="imageUrl" type="hidden" class="form-control @error('imageUrl') is-invalid @enderror" name="imageUrl" value="{{ $sauce->imageUrl }}">

                                        @error('imageUrl')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


{{--                            Modale --}}
                            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel">Add an image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="url" id="modalImageUrl" class="form-control" placeholder="Collez le lien de l'image ici">
                                            <img id="imagePreview" src="" alt="Image Preview" class="img-fluid mt-3" style="display: none;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abort</button>
                                            <button type="button" class="btn btn-primary" id="confirmImage">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="heat" class="col-md-4 col-form-label text-md-right">Heat</label>

                                <div class="col-md-6">
                                    <input id="heat" type="range" class="form-range form-control @error('heat') is-invalid @enderror" min="1" max="10" step="1" name="heat" value="{{ $sauce->heat }}">
                                    <div class="d-flex justify-content-between ms-2">
                                        @for($i = 1; $i <= 10; $i++)
                                            <span>{{$i}}</span>
                                        @endfor
                                    </div>

                                    @error('heat')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong> //signaler l'erreur jsp
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @endsection
    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modalImageUrl = document.getElementById('modalImageUrl');
                const imagePreview = document.getElementById('imagePreview');
                const currentImagePreview = document.getElementById('currentImagePreview');


                modalImageUrl.addEventListener('input', function() {
                    const url = this.value;
                    if (url) {
                        imagePreview.src = url;
                        imagePreview.style.display = 'block';
                    } else {
                        imagePreview.style.display = 'none';
                    }
                });

                document.getElementById('confirmImage').addEventListener('click', function() {
                    const url = modalImageUrl.value;
                    document.getElementById('imageUrl').value = url;
                    currentImagePreview.src = url;
                    document.querySelector('.btn-close').click(); // Close the modal
                });
            });
        </script>
    @endsection
</div>

