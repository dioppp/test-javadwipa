@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold mb-3">Customers</div>
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
                                data-bs-target="#addCustomer">
                                <i class="ti ti-plus"></i>
                                <span class="ms-2">
                                    Add Customer
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
                                    @forelse ($customer as $c)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $c->customer_id }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $c->customer_name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $c->customer_city }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0 fw-normal">{{ $c->created_at }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0 fw-normal">{{ $c->updated_at }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editCustomer" data-bs-id="{{ $c->customer_id }}"
                                                    data-bs-name="{{ $c->customer_name }}" data-bs-city="{{ $c->customer_city }}">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAlert" data-bs-id="{{ $c->customer_id }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="border-bottom-0 text-center" colspan="6">
                                                <h6 class="fw-semibold mb-0">No data available</h6>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                        <!-- Modal -->
                        <!-- Add Customer -->
                        <div class="modal fade" id="addCustomer" tabindex="-1" aria-labelledby="addCustomerLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addCustomerLabel">Add Customer Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('customers.store') }}" method="POST" custom-action>
                                            @csrf
                                            <input type="hidden" value="{{ now() }}" name="created_at">
                                            <input type="hidden" value="" name="updated_at">
                                            <div class="mb-3">
                                                <label for="customer_name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('customer_name') is-invalid @enderror"
                                                    id="customer_name" name="customer_name"
                                                    value="{{ old('customer_name') }}" placeholder="Enter customer name">
                                                @error('customer_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="customer_city" class="form-label">City</label>
                                                <input type="text"
                                                    class="form-control @error('customer_city') is-invalid @enderror"
                                                    id="customer_city" name="customer_city"
                                                    value="{{ old('customer_city') }}" placeholder="Enter customer city">
                                                @error('customer_city')
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
                        {{-- End Add Customer --}}

                        {{-- Edit Customer --}}
                        <div class="modal fade" id="editCustomer" tabindex="-1" aria-labelledby="editCustomerLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editCustomerLabel">Edit Customer Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" id="editForm" custom-action>
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="customer_id" id="idEdit">
                                            <input type="hidden" value="{{ now() }}" name="updated_at">
                                            <div class="mb-3">
                                                <label for="customer_name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('customer_name') is-invalid @enderror"
                                                    id="nameEdit" name="customer_name" placeholder="Enter customer name">
                                                @error('customer_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="customer_city" class="form-label">City</label>
                                                <input type="text"
                                                    class="form-control @error('customer_city') is-invalid @enderror"
                                                    id="cityEdit" name="customer_city" placeholder="Enter customer city">
                                                @error('customer_city')
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
                        {{-- End Edit Customer --}}

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
                                            <input type="hidden" name="customer_id" id="idDelete">
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
        const exampleModal = document.getElementById('editCustomer')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget

                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id');
                const name = button.getAttribute('data-bs-name');
                const city = button.getAttribute('data-bs-city');

                // Update the modal's content.
                document.getElementById('editForm').setAttribute('action', '/customers/' + id);
                const modalBodyInputId = exampleModal.querySelector('#idEdit');
                const modalBodyInputName = exampleModal.querySelector('#nameEdit');
                const modalBodyInputCity = exampleModal.querySelector('#cityEdit');

                modalBodyInputId.value = id;
                modalBodyInputName.value = name;
                modalBodyInputCity.value = city;
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
                document.getElementById('deleteForm').setAttribute('action', '/customers/' + id);
                const modalBodyInputId = deleteModal.querySelector('#idDelete');
                modalBodyInputId.value = id;
            })
        }
    </script>
@endpush
