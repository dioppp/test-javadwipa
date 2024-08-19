@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold mb-3">Orders</div>
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
                                data-bs-target="#addOrder">
                                <i class="ti ti-plus"></i>
                                <span class="ms-2">
                                    Add Order
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
                                            <h6 class="fw-semibold mb-0">Order Date</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Amount</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Salesman ID</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Customer ID</h6>
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
                                    @forelse ($order as $o)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $o->order_id }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $o->order_date }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ number_format($o->amount, 2, ',', '.') }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $o->salesman_id }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $o->customer_id }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0 fw-normal">{{ $o->created_at }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0 fw-normal">{{ $o->updated_at }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editOrder" data-bs-id="{{ $o->order_id }}"
                                                    data-bs-date="{{ $o->order_date }}"
                                                    data-bs-amount="{{ $o->amount }}"
                                                    data-bs-salesman="{{ $o->salesman_id }}"
                                                    data-bs-customer="{{ $o->customer_id }}">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAlert" data-bs-id="{{ $o->order_id }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="border-bottom-0 text-center" colspan="8">
                                                <h6 class="fw-semibold mb-0">No data available</h6>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                        <!-- Modal -->
                        <!-- Add Order -->
                        <div class="modal fade" id="addOrder" tabindex="-1" aria-labelledby="addOrderLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addOrderLabel">Add Order Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('orders.store') }}" method="POST" custom-action>
                                            @csrf
                                            <input type="hidden" value="{{ now() }}" name="created_at">
                                            <input type="hidden" value="" name="updated_at">
                                            <div class="mb-3">
                                                <label for="order_date" class="form-label">Order Date</label>
                                                <input type="date"
                                                    class="form-control @error('order_date') is-invalid @enderror"
                                                    id="order_date" name="order_date" value="{{ old('order_date') }}"
                                                    placeholder="Enter order date">
                                                @error('order_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="number"
                                                    class="form-control @error('amount') is-invalid @enderror"
                                                    id="amount" name="amount" value="{{ old('amount') }}"
                                                    placeholder="Enter order amount" step="0.01">
                                                @error('amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="salesman_id" class="form-label">Salesman</label>
                                                <select class="form-select @error('salesman_id') is-invalid @enderror"
                                                    name="salesman_id" id="salesman_id">
                                                    <option value="" disabled selected>Select salesman</option>
                                                    @foreach ($salesman as $s)
                                                        <option value="{{ $s->salesman_id }}">{{ $s->salesman_id . ' - ' . $s->salesman_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('salesman_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="customer_id" class="form-label">Customer</label>
                                                <select class="form-select @error('customer_id') is-invalid @enderror"
                                                    name="customer_id" id="customer_id">
                                                    <option value="" disabled selected>Select customer</option>
                                                    @foreach ($customer as $c)
                                                        <option value="{{ $c->customer_id }}">{{ $c->customer_id . ' - ' . $c->customer_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
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
                        {{-- End Add Order --}}

                        {{-- Edit Order --}}
                        <div class="modal fade" id="editOrder" tabindex="-1" aria-labelledby="editOrderLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editOrderLabel">Edit Order Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" id="editForm" custom-action>
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="order_id" id="idEdit">
                                            <input type="hidden" value="{{ now() }}" name="updated_at">
                                            <div class="mb-3">
                                                <label for="order_date" class="form-label">Order Date</label>
                                                <input type="date"
                                                    class="form-control @error('order_date') is-invalid @enderror"
                                                    id="orderEdit" name="order_date" placeholder="Enter order date">
                                                @error('order_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="number"
                                                    class="form-control @error('amount') is-invalid @enderror"
                                                    id="amountEdit" name="amount" placeholder="Enter order amount"
                                                    step="0.01">
                                                @error('amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="salesman_id" class="form-label">Salesman</label>
                                                <select class="form-select @error('salesman_id') is-invalid @enderror"
                                                    name="salesman_id" id="salesmanEdit">
                                                    <option value="" disabled>Select salesman</option>
                                                    @foreach ($salesman as $s)
                                                        <option value="{{ $s->salesman_id }}">{{ $s->salesman_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('salesman_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="customer_id" class="form-label">Customer</label>
                                                <select class="form-select @error('customer_id') is-invalid @enderror"
                                                    name="customer_id" id="customerEdit">
                                                    <option value="" disabled>Select customer</option>
                                                    @foreach ($customer as $c)
                                                        <option value="{{ $c->customer_id }}">{{ $c->customer_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
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
                        {{-- End Edit Order --}}

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
                                            <input type="hidden" name="order_id" id="idDelete">
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
        const exampleModal = document.getElementById('editOrder')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget

                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id');
                const date = button.getAttribute('data-bs-date');
                const amount = button.getAttribute('data-bs-amount');
                const salesman = button.getAttribute('data-bs-salesman');
                const customer = button.getAttribute('data-bs-customer');

                // Update the modal's content.
                document.getElementById('editForm').setAttribute('action', '/orders/' + id);
                const modalBodyInputId = exampleModal.querySelector('#idEdit');
                const modalBodyInputDate = exampleModal.querySelector('#orderEdit');
                const modalBodyInputAmount = exampleModal.querySelector('#amountEdit');
                const modalBodyInputSalesman = exampleModal.querySelector('#salesmanEdit');
                const modalBodyInputCustomer = exampleModal.querySelector('#customerEdit');

                modalBodyInputId.value = id;
                modalBodyInputDate.value = date;
                modalBodyInputAmount.value = amount;
                modalBodyInputSalesman.value = salesman;
                modalBodyInputCustomer.value = customer;
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
                document.getElementById('deleteForm').setAttribute('action', '/orders/' + id);
                const modalBodyInputId = deleteModal.querySelector('#idDelete');
                modalBodyInputId.value = id;
            })
        }
    </script>
@endpush
