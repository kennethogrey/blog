<div>
    <div class='row mt-4 mb-2'>
        <div class='col-md-6'>
            <div class="card">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <h4>Categories</h4>
                    <li class="nav-item ms-auto">
                      <a class="btn  btn-sm btn-primary" href="" data-bs-toggle="modal" data-bs-target="#categories_modal">Add Categories</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                          <thead>
                            <tr>
                              <th>Category Name</th>
                              <th>No. of SubCategories</th>
                              <th class="w-1"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{$category->category_name}}</td>
                                    <td class="text-muted">
                                        4
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class='btn btn-sm btn-primary'>Edit</a> &nbsp
                                            <a href="#" class='btn btn-sm btn-danger'> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"><span class="text-danger">No categories found.</span></td>
                                </tr>
                            @endforelse
                          </tbody>
                        </table>
                    </div>
                </div>
              </div>
        </div>
        <div class='col-md-6 mb-2'>
            <div class="card">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <h4>SubCategories</h4>
                    <li class="nav-item ms-auto">
                      <a class="btn  btn-sm btn-primary" href="" data-bs-toggle="modal" data-bs-target="#subcategories_modal" >Add SubCategories</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                          <thead>
                            <tr>
                              <th>SubCategory Name</th>
                              <th>Parent Category</th>
                              <th>No. of Posts</th>
                              <th class="w-1"></th>
                            </tr>
                          </thead>
                          <tbody>
                            {{-- @forelse($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td> --}}
                                    <td class="text-muted">
                                        any category
                                    </td>
                                    <td>4</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class='btn btn-sm btn-primary'>Edit</a> &nbsp
                                            <a href="#" class='btn btn-sm btn-danger'> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            {{-- @empty
                                <tr>
                                    <td colspan="3"><span class="text-danger">No categories found.</span></td>
                                </tr>
                            @endforelse --}}
                          </tbody>
                        </table>
                    </div>
                </div>
              </div>
        </div>
    </div>
    
    <div wire:ignore.self class="modal modal-blur fade" id="categories_modal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop='static' data-bs-keyboard='false'>
        <div class="modal-dialog modal-dialog-centered" role="document">
          <form class="modal-content" method='post'
            @if($updateCategoryMode)
                wire:submit.prevent='updateCategory()'
            @else
            wire:submit.prevent='addCategory()'

            @endif
          >
            <div class="modal-header">
              <h5 class="modal-title">{{$updateCategoryMode ? 'Update Category' : 'Add Category'}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($updateCategoryMode)
                    <input type='hidden' wire:model='selected_category_id'>
                @endif
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Enter Category Name" wire:model='category_name'>
                    <span class='text-danger'>@error('category_name'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">{{$updateCategoryMode ? "Update":"Save"}}</button>
            </div>
          </form>
        </div>
    </div>
    
    <div class="modal modal-blur fade" id="subcategories_modal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <form class="modal-content" method='post'>
            <div class="modal-header">
              <h5 class="modal-title">Add SubCategory</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="form-label">Parent Category</div>
                    <select class="form-select">
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                <div class="mb-3">
                    <label class="form-label">SubCategory Name</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Enter SubCategory Name">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>