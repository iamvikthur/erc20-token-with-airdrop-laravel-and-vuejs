<template>
  <div id="saWarning" class="col-lg-12 col-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">                                
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Warning message, with "Confirm" button</h4>
                                                    </div>
                                                </div>
                                            </div>                            
                                            <div class="widget-content widget-content-area text-center">
                                                <button class="mr-2 btn btn-primary  warning confirm">Confirm</button>
                                
                                                <div class="code-section-container">
                                                            
                                                    <button class="btn toggle-code-snippet"><span>Code</span></button>
                                
                                                    <div class="code-section text-left">
                                                        <!-- <pre>
&lt;button class="mr-2 btn btn-primary  warning confirm"&gt;Confirm&lt;/button&gt;

$('.widget-content .warning.confirm').on('click', function () {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        padding: '2em'
    }).then(function(result) {
        if (result.value) {
            swal(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
    }
    })
})</pre> -->
                                                    </div>
                                                </div>
                                
                                            </div>
                                        </div>
                                    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>