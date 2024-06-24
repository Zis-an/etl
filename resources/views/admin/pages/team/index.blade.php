@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ETL</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Resource</a></li>
                        <li class="breadcrumb-item active">Team!</li>
                    </ol>
                </div>
                <h4 class="page-title">Team!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <!-- Large modal -->
                    @can('team-create')
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Designation</th>
                        <th>Details</th>
                        <th>Order No</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $key=>$teamData)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            <img src="{{asset('images/team/'. $teamData->image )}}" alt="Current Image" style="max-width: 50px;">
                        </td>
                        <td>{{$teamData->name}}</td>
                        <td>{{$teamData->email}}</td>
                        <td>{{$teamData->phone}}</td>
                        <td>{{$teamData->designation}}</td>
                        <td>{!! Str::limit($teamData->details, 30) !!}</td>
                        <td>{{$teamData->order_no}}</td>
                        <td>{{$teamData->status==1? 'Active':'Inactive'}}</td>

{{--                        --}}
{{--                        <td style="width: 100px;">--}}
{{--                            <div class="d-flex justify-content-end gap-1">--}}
{{--                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$teamData->id}}">Edit</button>--}}
{{--                                <a href="{{route('team.destroy',$teamData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$teamData->id}}">Delete</a>--}}
{{--                                --}}
{{--                            </div>--}}
{{--                        </td>--}}

                        <td style="width: 100px;">
                            <div class="d-flex justify-content-end gap-1">
                                @can('team-edit')
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$teamData->id}}">Edit</button>
                                @endcan

                                @can('team-delete')
                                    <a href="{{ route('team.destroy', $teamData->id) }}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{ $teamData->id }}">Delete</a>
                                @endcan
                            </div>
                        </td>

                        <!--Edit Modal -->
                        <div class="modal fade" id="editNewModalId{{$teamData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="addNewModalLabel{{$teamData->id}}">Edit</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('team.update',$teamData->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" id="name" name="name" value="{{$teamData->name}}"
                                                               class="form-control" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" id="date" name="email" value="{{$teamData->email}}"
                                                               class="form-control" placeholder="Enter Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="text" id="phone" name="phone" value="{{$teamData->phone}}"
                                                               class="form-control" placeholder="Enter Phone">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="designation" class="form-label">Designation</label>
                                                        <input type="text" id="designation" name="designation" value="{{$teamData->designation}}"
                                                               class="form-control" placeholder="Enter Designation">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="linkedin_link" class="form-label">Linkedin Link</label>
                                                        <input type="text" id="linkedin_link" name="linkedin_link" value="{{$teamData->linkedin_link}}"
                                                               class="form-control" placeholder="Enter Position No">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="fb_link" class="form-label">Facebook Link</label>
                                                        <input type="text" id="fb_link" name="fb_link" value="{{$teamData->fb_link}}"
                                                               class="form-control" placeholder="Enter Facebook Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label for="order_no" class="form-label">Order No</label>
                                                        <input type="number" id="order_no" name="order_no" value="{{$teamData->order_no}}"
                                                               class="form-control" placeholder="Enter Order No">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label for="example-fileinput" class="form-label">Image</label>
                                                        <input type="file" name="image" class="form-control">
                                                        <img src="{{asset('images/team/'. $teamData->image )}}" alt="Current Image" class="mt-2" style="max-width: 100px;">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label for="example-select" class="form-label">Status</label>
                                                        <select name="status" class="form-select">
                                                            <option value="1" {{ $teamData->status === 1 ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ $teamData->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label> Details </label>
                                                        <textarea class="form-control" name="details" rows="5" placeholder="Enter the Description">{{ strip_tags($teamData->details) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal -->
                        <div id="danger-header-modal{{$teamData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$teamData->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-danger">
                                        <h4 class="modal-title" id="danger-header-modalLabe{{$teamData->id}}l">Delete</h4>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <a href="{{route('team.destroy',$teamData->id)}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Add Modal -->
    <div class="modal fade" id="addNewModalId" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">Add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('team.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name"
                                           class="form-control" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="date" name="email"
                                           class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" id="phone" name="phone"
                                           class="form-control" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" id="designation" name="designation"
                                           class="form-control" placeholder="Enter Designation" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="linkedin_link" class="form-label">Linkedin Link</label>
                                    <input type="text" id="linkedin_link" name="linkedin_link"
                                           class="form-control" placeholder="Enter Position No">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="fb_link" class="form-label">Facebook Link</label>
                                    <input type="text" id="fb_link" name="fb_link"
                                           class="form-control" placeholder="Enter Facebook Link">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="order_no" class="form-label">Order No</label>
                                    <input type="number" id="order_no" name="order_no"
                                           class="form-control" placeholder="Enter Order No" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" name="image" id="example-fileinput" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label> Details </label>
                                    <textarea class="form-control" id="content" name="details" placeholder="Enter the Description" name="body"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
