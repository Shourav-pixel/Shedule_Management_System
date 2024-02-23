
<?php $__env->startSection('abc'); ?>
<br>
<br>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container-fluid">
    <center><h3>Create Exam</h3></center>
    <?php if(Session::has('msg')): ?>
        <div class="alert alert-success">
      <strong><?php echo e(Session::get('msg')); ?></strong>
      </div>
    <?php endif; ?>
    <form method="post" action="<?php echo e(url('exam-routine-store')); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
        <label for="">Select Session:</label>
            <select name="session" class="form-control" id="session" style="font-size: 20px;">
              <option value="">Select Session</option>
              <?php $__currentLoopData = $session; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($session -> id); ?>"><?php echo e($session->session); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div class="form-group">
            <label for="exam_type">Exam Type</label>
            <select name="exam_type" class="form-control" id="exam_type" style="font-size: 20px;">
                <option value="">Select Type</option>
                <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($type -> id); ?>"><?php echo e($type->type); ?>

                            
                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
        </div>

        <div class="form-group">
        <label for="">Select Semester:</label>
            <select name="semester" class="form-control getSemester" id="semester" style="font-size: 20px;">
              <option value="">Select Semester</option>
              <?php $__currentLoopData = $semester; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($sem -> id); ?>"><?php echo e($sem->semester); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
    <!-- getting courses semesterwise -->
        <div class="form-group">
        <label for="">Select Course:</label>
            <select name="course" class="form-control getCourse" id="course" style="font-size: 20px;">
              <option value="">Select Course</option>
          </select>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control" id="date" style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="time" name="start_time" class="form-control" id="start_time" style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="time" name="end_time" class="form-control" id="end_time" style="font-size: 22px;">
        </div>

        <div class="form-group">
            <label for="room">Room Number:</label>
            <input type="text" name="room" class="form-control" id="room" style="font-size: 22px;">
        </div>
     



       
        <br>
        <div class="form-group">
            <center><button type="submit" class="btn btn-primary" style="font-size: 22px;">Save</button></center>
        </div>
        
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('.getSemester').change(function(){
    var semester_id = $(this).val();
    $.ajax({
        url: "<?php echo e(url('get_course')); ?>",
        type: 'POST',
        data:{
            "_token":"<?php echo e(csrf_token()); ?>",
            semester_id:semester_id,
        },
        dataType:"json",
        success:function(response){
            $('.getCourse').html(response.html)

        },
    });
});

</script>

<style>
    .container-fluid {
    max-width: 800px; /* Adjust the width as needed */
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px; /* Add padding to the container */
    background-color: rgba(255, 255, 255, 0.9); /* Optional background color */
}

label {
        font-size: 18px; /* Adjust the font size as needed */
    }

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Software Development\schedule_mangement\resources\views/admin/pages/Routine/ExamRoutine/create.blade.php ENDPATH**/ ?>