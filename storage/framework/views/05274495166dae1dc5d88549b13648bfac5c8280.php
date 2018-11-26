
<div class="row row-offcanvas row-offcanvas-right">       
    <div class="col-md-12">
        <div class="col-md-7">
            <h4><i class="fa fa-graduation-cap fa-x2" aria-hidden="true"></i> Libreta:</h4>
            <div class="form-group has-feedback <?php echo e($errors->has('libreta') ? ' has-error' : ''); ?> " v-bind:class="{'': true, 'has-error': errors.has('libreta') }">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o"></i></span>

                    <input type="file" class="form-control" id="libreta"  name="libreta" value=""  placeholder="Apellido Paterno" 
                           v-model="libreta" 
                           v-validate.initial="libreta" 
                           data-vv-rules="required|min:3|max:255" 
                           data-vv-delay="500" 
                           v-bind:class="{'': true, 'has-error': errors.has('libreta') }">

                </div>
                <span class="glyphicon  form-control-feedback" aria-hidden="true" v-bind:class="{'': true, 'glyphicon-remove': errors.has('libreta') }"></span>
                <?php if($errors->has('libreta')): ?><span class="help-block"><strong><?php echo e($errors->first('libreta')); ?></strong></span>
                <?php endif; ?>
            </div>

        </div>
    </div><!-- ********** // Col 2 ********** --> 
</div>    

<!-- ***************************** -->
<div class="col-md-12">
    <div class="enviarbtn">                            
        <?php echo Form::submit('Validar Registro', ['class' => 'btn btn-primary']);; ?>

    </div>

</div> 
</div>