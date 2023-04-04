<div class="container-fluid">
  <h3 class="my-3">Add New Employee</h3>
  <form method="post" class="mb-4">
    <div class="mb-3">
      <label for="nameEmployee" class="form-label">Fullname</label>
      <input type="text" class="form-control" id="nameEmployee" name="employee_name">
    </div>
    <div class="mb-3">
      <label for="nameEmployee" class="form-label">Gender</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="maleGender">
        <label class="form-check-label" for="maleGender">
          Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="femaleGender">
        <label class="form-check-label" for="femaleGender">
          Female
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label for="brithDayInput" class="form-label">Brithday</label>
      <input type="date" class="form-control" id="brithDayInput" name="brithday">
    </div>
    <div class="mb-3">
      <label for="addressinput" class="form-label">Address</label>
      <input type="text" class="form-control" id="addressinput" name="address">
    </div>
    <div class="mb-3">
      <label for="startWorkingTime" class="form-label">Start Working On</label>
      <input type="date" class="form-control" id="startWorkingTime" name="start_working">
    </div>
    <div class="mb-3">
      <label for="job" class="form-label">Job</label>
      <select class="form-select" id="job" aria-label="Default select example">
        <option value="1">Staff</option>
        <option value="2">Manager</option>
        <option value="3">Office</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="officeInput" class="form-label">Office</label>
      <select class="form-select" id="officeInput" aria-label="Default select example">
        <option value="1">Jakarta</option>
        <option value="2">Bandung</option>
        <option value="3">Tanggerang</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>