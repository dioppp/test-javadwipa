@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold mb-3">Salesman</div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                            style="margin-left: 20px; margin-right: 20px">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                            style="margin-left: 20px; margin-right: 20px">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addSalesman">
                                <i class="ti ti-plus"></i>
                                <span class="ms-2">
                                    Add Salesman
                                </span>
                            </button>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">ID</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Name</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">City</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Commission</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Created At</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Updated At</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($salesman as $s)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $s->salesman_id }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $s->salesman_name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $s->salesman_city }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ number_format($s->commission, 2) }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0 fw-normal">{{ $s->created_at }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0 fw-normal">{{ $s->updated_at }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editSalesman" data-bs-id="{{ $s->salesman_id }}"
                                                    data-bs-name="{{ $s->salesman_name }}"
                                                    data-bs-city="{{ $s->salesman_city }}"
                                                    data-bs-commission="{{ $s->commission }}">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAlert" data-bs-id="{{ $s->salesman_id }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="border-bottom-0 text-center" colspan="7">
                                                <h6 class="fw-semibold mb-0">No data available</h6>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                        <!-- Modal -->
                        <!-- Add Salesman -->
                        <div class="modal fade" id="addSalesman" tabindex="-1" aria-labelledby="addSalesmanLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addSalesmanLabel">Add Salesman Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('salesman.store') }}" method="POST" custom-action>
                                            @csrf
                                            <input type="hidden" value="{{ now() }}" name="created_at">
                                            <input type="hidden" value="" name="updated_at">
                                            <div class="mb-3">
                                                <label for="salesman_name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('salesman_name') is-invalid @enderror"
                                                    id="salesman_name" name="salesman_name"
                                                    value="{{ old('salesman_name') }}" placeholder="Enter salesman name">
                                                @error('salesman_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="salesman_city" class="form-label">City</label>
                                                <input type="text"
                                                    class="form-control @error('salesman_city') is-invalid @enderror"
                                                    id="salesman_city" name="salesman_city"
                                                    value="{{ old('salesman_city') }}" placeholder="Enter salesman city">
                                                @error('salesman_city')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="commission" class="form-label">Commission</label>
                                                <input type="number"
                                                    class="form-control @error('commission') is-invalid @enderror"
                                                    id="commission" name="commission" value="{{ old('commission') }}"
                                                    placeholder="Enter commission" step="0.01">
                                                @error('commission')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Add Salesman --}}

                        {{-- Edit Salesman --}}
                        <div class="modal fade" id="editSalesman" tabindex="-1" aria-labelledby="editSalesmanLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editSalesmanLabel">Edit Salesman Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" id="editForm" custom-action>
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="salesman_id" id="idEdit">
                                            <input type="hidden" value="{{ now() }}" name="updated_at">
                                            <div class="mb-3">
                                                <label for="salesman_name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('salesman_name') is-invalid @enderror"
                                                    id="nameEdit" name="salesman_name"
                                                    placeholder="Enter salesman name">
                                                @error('salesman_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="salesman_city" class="form-label">City</label>
                                                <input type="text"
                                                    class="form-control @error('salesman_city') is-invalid @enderror"
                                                    id="cityEdit" name="salesman_city"
                                                    placeholder="Enter salesman city">
                                                @error('salesman_city')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="commission" class="form-label">Commission</label>
                                                <input type="number"
                                                    class="form-control @error('commission') is-invalid @enderror"
                                                    id="commissionEdit" name="commission"
                                                    placeholder="Enter commission" step="0.01">
                                                @error('commission')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Edit Salesman --}}

                        {{-- Delete Alert --}}
                        <div class="modal fade" id="deleteAlert" tabindex="-1" aria-labelledby="deleteAlertLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteAlertLabel">Confirmation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this data?</p>
                                        <form id="deleteForm" method="POST" class="d-inline" custom-action>
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="salesman_id" id="idDelete">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Delete Alert --}}
                        {{-- End Modal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Edit Modal --}}
    <script>
        const exampleModal = document.getElementById('editSalesman')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget

                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id');
                const name = button.getAttribute('data-bs-name');
                const city = button.getAttribute('data-bs-city');
                const commission = button.getAttribute('data-bs-commission');

                // Update the modal's content.
                document.getElementById('editForm').setAttribute('action', '/salesman/' + id);
                const modalBodyInputId = exampleModal.querySelector('#idEdit');
                const modalBodyInputName = exampleModal.querySelector('#nameEdit');
                const modalBodyInputCity = exampleModal.querySelector('#cityEdit');
                const modalBodyInputCommission = exampleModal.querySelector('#commissionEdit');

                modalBodyInputId.value = id;
                modalBodyInputName.value = name;
                modalBodyInputCity.value = city;
                modalBodyInputCommission.value = commission;
            })
        }
    </script>

    {{-- Delete --}}
    <script>
        const deleteModal = document.getElementById('deleteAlert')
        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-bs-id');
                document.getElementById('deleteForm').setAttribute('action', '/salesman/' + id);
                const modalBodyInputId = deleteModal.querySelector('#idDelete');
                modalBodyInputId.value = id;
            })
        }
    </script>
@endpush
