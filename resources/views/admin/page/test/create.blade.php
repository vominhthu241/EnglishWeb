@extends('admin.layout.master') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet light " id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                    <span class="caption-subject font-red bold uppercase"> Form Wizard -
                        <span class="step-title"> Step 1 of 4 </span>
                    </span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-trash"></i>
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" action="{{route('create')}}" id="submit_form" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number"> 1 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Create Test </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Content </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step active">
                                        <span class="number"> 3 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Question & Answer </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab4" data-toggle="tab" class="step">
                                        <span class="number"> 4 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Save </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success"> </div>
                            </div>
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful! 
                                </div>

                                <div class="tab-pane active" id="tab1">
                                    <h3 class="block">Create Test</h3>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Test Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="testname" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Test Type
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select name="testtype" class="form-control">
                                                <option value="listening">Listening</option>
                                                <option value="reading">Reading</option>
                                            <select>
                                        </div>
                                    </div>   
                                </div>

                                <div class="tab-pane" id="tab2">
                                    <h3 class="block">Input Content</h3>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Test Type
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control">
                                                <option value="listening">Listening</option>
                                                <option value="reading">Reading</option>
                                            <select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Time
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" name="times" class="form-control timepicker timepicker-24">
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-clock-o"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Upload
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" id="images" name="upload[]" onchange="preview_images();" multiple/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nội Dung</label>
                                        <div class="col-md-8">
                                            <textarea name="content" id="summernote_1"> </textarea>
                                        </div>
                                        <div class="col-md-offset-3 col-md-9" id="image_preview"></div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab3">
                                    <h3 class="block">Input Question and Answer</h3>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Question
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea name="question" class="form-textarea form-control" style="width:98%"></textarea>
                                            <span class="help-block"> </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="portlet-body col-md-offset-2 col-md-8">
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                                id="sample_2">
                                                <thead>
                                                <tr>
                                                    <th width="80%"> Answers</th>
                                                    <th class="table-checkbox">
                                                        <label> Answer Correct</label>
                                                    </th>
                                                    <th><a id="addRow" class="btn btn-outline btn-circle btn-sm purple">
                                                            <i class="fa fa-plus"></i></a>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="odd gradeX" id="tr0">
                                                    <td>
                                                        <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                                            <textarea name="answers[]" class="form-textarea"
                                                                    style="width:98%"></textarea>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="correct" class="checkboxes" value="1"/>
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td><a id="delete1" class="deleteRow btn btn-outline btn-circle dark btn-sm black">
                                                            <i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab4">
                                    <h3 class="block">Confirm content of test</h3>
                                    <h4 class="form-section">Test</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Test Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="testname" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Test Type
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control">
                                                <option value="listening">Listening</option>
                                                <option value="reading">Reading</option>
                                            <select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Time
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker timepicker-24">
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-clock-o"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="javascript:;" class="btn default button-previous">
                                        <i class="fa fa-angle-left"></i> Back </a>
                                    <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    <button class="btn green button-submit"> Submit
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jquery')
<!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
            <script src="./../assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="../assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
<script>
    function preview_images() {
        var total_file = document.getElementById("images").files.length;
        for (var i = 0; i < total_file; i++) {
            $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(
                event.target.files[i]) + "'></div>");
        }
    }
</script>
@endsection
@section('jquery')
    <script>
        var next = 1;
        $('#addRow').on('click', function () {
            addRow(next);
            next++;

        });

        function addRow(next) {
            console.log(next);
            var tr = '<tr class="odd gradeX" id="tr' + next + '">' +
                '<td>' +
                ' <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">' +
                '<textarea name="answers[]" class="form-textarea required" style="width:98%"></textarea>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">' +
                '<input name="correct" type="checkbox" class="checkboxes" value="1" />' +
                '<span>' + '</span>' +
                '</label>' +
                '</td>' +
                '<td><a id="delete' + next + '"  class="deleteRow btn btn-outline btn-circle dark btn-sm black">' +
                '<i class="fa fa-trash-o"></i></a>' +
                '</td>' +
                '</tr>';
            $('tbody').append(tr);

            $('.deleteRow').on('click', function () {

                id = $(this).attr('id');
                a = id.replace('delete', '');
                $('#tr' + a).remove();
            });
        };

    </script>
@endsection
