<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeClass[]|\Cake\Collection\CollectionInterface $attributeClasses
 */

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeType[]|\Cake\Collection\CollectionInterface $attributeTypes
 */
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
</style>

<div class="right_col" role="main">
    <div class="row">
        <form action="" id="fullData">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Select Attribute Class</label>
                        <select class="form-control attibuteClassId" name="attribute_class_id" id="attributeclassId"
                                onchange="get_attributeType()">
                            <option>Choose One</option>
                            <option value="addAtrClass">ADD Attribute Class</option>
                            <?php foreach ($attributeClasses as $attributeClass) : ?>
                                <option value="<?php echo $attributeClass->attribute_class_id ?>">
                                    <?php echo $attributeClass->attribute_class_name ?>
                                </option>


                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" id="attributeclassName" name="attribute_class_name"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Select Attribute Type</label>

                        <select class="form-control appendType attibuteTypeId" name="attribute_type_id"
                                id="attributetypeId"
                                onchange="get_attributeValue()">
                            <option>Choose Attribute Type</option>
                            <option value="addAtrType">Add One</option>
                            <!--<option value="addAtrType">ADD Attribute Type</option>-->

                        </select>


                        <input type="hidden" id="attributetypeName" name="attribute_type_name"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Select Attribute Value</label>
                        <br>
                        <div class="input-group">
                            <select class="chzn-select appendValue" name="attribute_field_id[]" multiple tabindex="4"
                                    style="width:400px;"
                                    id="attributeValueId">

                            </select>
                            <input type="hidden" id="attributevalueName" name="attribute_field_value"/>
                        </div>
                    </div>

                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"
                            style="margin: 24px 0px 0;"> Add Attribute Value
                    </button>
                </div>
                <div class="col-md-12">
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" onclick="myReload()" name="submit" class="btn btn-success buttonOff">Submit
                    </button>
                </div>
            </div>
        </form>

        <br><br>


        <!--        <h2>Full Submit Information Table</h2>-->
        <!---->
        <!--        <table class="fullDataTable">-->
        <!--            <thead>-->
        <!--            <tr>-->
        <!--                <th>Select Attribute Class</th>-->
        <!--                <th>Select Attribute Type</th>-->
        <!--                <th>Select Attribute Value</th>-->
        <!--                <th>Action</th>-->
        <!--            </tr>-->
        <!--            <thead>-->
        <!--            <tbody>-->
        <!--            <tr>-->
        <!--                <td>-->
        <!---->
        <!--                </td>-->
        <!--                <td>-->
        <!---->
        <!--                </td>-->
        <!--                <td>-->
        <!---->
        <!--                </td>-->
        <!--            </tr>-->
        <!--            <tbody>-->
        <!---->
        <!---->
        <!--        </table>-->


    </div>
</div>


<div class="modal fade test" id="classModel" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Attribute Class Name</h4>

                <form action="" id="registerSubmit">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name"
                                   placeholder="Enter Name"
                                   name="attribute_class_name" required="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button id="send" type="submit" value="Register" class="btn btn-success me">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade test2" id="typeModel" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Attribute Type Name</h4>
            </div>
            <form action="" id="attributeType">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="typeName"
                               placeholder="Enter Attribute Type Name"
                               name="attribute_type_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button id="send" type="submit" class="btn btn-success typename">Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade test3 valueModel" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Attribute Value</h4>
            </div>


            <div class="field_wrapper">
                <form action="" id="attFrmValue">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control"
                                   name="attribute_field_value[]"
                                   placeholder="Enter Attribute Value Name"/>
                            <a href="javascript:void(0);" class="add_button" title="Add field">
                                Add
                            </a>
                        </div>
                    </div>

                    <br><br><br>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button id="valueId" type="submit" class="btn btn-success valueOff">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper .form-group'); //Input field wrapper
        var fieldHTML = '<div><input type="text" class="form-control" name="attribute_field_value[]"\n' +
            '                                                       placeholder="Enter Attribute Type Name"/><a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1
        $(addButton).click(function () { //Once add button is clicked
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>


<script>
    $(function () {
        $(".chzn-select").select2();
    });
</script>


<script>

    $(function () {
        $('#attributeclassId').on('change', function () {

            // console.log($(this).val());
            if ($(this).val() == 'addAtrClass') {
                $('.test').modal('show');
            }
        });


        $('#attributetypeId').on('change', function () {

            // console.log($(this).val());
            if ($(this).val() == 'addAtrType') {
                $('.test2').modal('show');
            }


        });

        $('#attributeValueId').on('change', function () {

            // console.log($(this).val());
            if ($(this).val() == 'addAtrValue') {
                $('.test3').modal('show');
            }


        });

////////////////// class start ///////////


        $(".me").on("click", function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: $("#registerSubmit").serialize(),
                
                url: "<?php echo $this->Url->build('/', true) ?>" + "AttributeClasses/Adminadd",
                
                success: function (data) {
                    console.log(data.attribute_class_id);
                    
                    $('#attributeclassId')
                        .append('<option value="' + data.attribute_class_id + '" selected="selected">' + data.attribute_class_name + '</option>')
                    $('#classModel').modal('hide');
                },
                dataType: "json"
            });

        });


        ////////// type start ////////////

        $(".typename").on("click", function (e) {
            e.preventDefault();
            $('#attributeclassId').val();
            
            console.log($('#attributeclassId').val());
            
            $.ajax({
                type: "POST",
                data: {'f': $("#typeName").val(), 'e': $('#attributeclassId').val()},
                url: "<?php echo $this->Url->build('/', true) ?>" + "AttributeTypes/Adminadd",
                success: function (data) {
                    
                    console.log(data);
                    $('#attributetypeId')
                        .append('<option value="' + data.attribute_type_id + '" selected="selected">' + data.attribute_type_name + '</option>')
                    $('#typeModel').modal('hide');
                    
                    
                },
                dataType: "json"
            });
        });


        ///////////////////////////// value start ////////////////////

        $(".valueOff").on("click", function (e) {

            e.preventDefault();

            var data = $("#attFrmValue").serializeArray();

            console.log(data);
            var length = data.length;
            console.log(data[0]['value']);
            // '<option value="' + data[0].user.attribute_class_id + '" selected="selected">' + data[0].user.attribute_class_id + '</option>'
            for (var i = 0; i < length; i++) {
                $('#attributeValueId').append('<option value="' + data[i]['value'] + '" selected="selected">' + data[i]['value'] + ',' + ' </option>');

            }
            $('.valueModel').modal('hide');

        });


        //// main


        $(".buttonOff").on("click", function (e) {
            e.preventDefault();

            ///  console.log($("#attributeType"));

            var attrclassName = $('#attributeclassId').find(":selected").text().trim();

            var attrtypeName = $('#attributetypeId').find(":selected").text().trim();

            var attrtypeValue = $('#attributeValueId').find(":selected").text().trim();

            // console.log(attrclassName, attrtypeName);

            $('#attributeclassName').val(attrclassName);

            $('#attributetypeName').val(attrtypeName);

            $('#attributevalueName').val(attrtypeValue);

            $.ajax({
                type: "POST",
                data: $("#fullData").serialize(),
                url: "<?php echo $this->Url->build('/', true) ?>" + "AttributeValues/AdminfullAdd",
                success: function (data) {
                    var classAtt = $('#attributeclassName').val();
                    var typeAtt = $('#attributetypeName').val();
                    var valueAtt = $('#attributevalueName').val();
                    console.log(classAtt, typeAtt, valueAtt);

                    console.log(data.updatedData);
                    // $('#attributetypeId')
                    //     .append('<option value="' + data.users.attribute_type_id + '" selected="selected">' + data.users.attribute_type_name + '</option>')
                    $('#typeModel').modal('hide');

                    $('.fullDataTable').append(
                        '<tr>' +
                        '<td>' + classAtt + '</td>' +
                        '<td>' + typeAtt + '</td>' +
                        '<td>' + valueAtt + '</td>' +
                        '<td>kk</td>' +
                        '</tr>'
                    );


                },
                dataType: "json"
            });
        });
    });

</script>


<script>


    function get_attributeType() {
        var class_id = $('.attibuteClassId').val();


        // console.log(class_id);

        $.ajax({

            url: "<?php echo $this->Url->build('/', true) ?>" + "AttributeTypes/AdmingetTypeData",

            data: {'attribute_types_class_id': class_id},
            type: "post",
            success: function (data) {

                //  console.log(data);

                var length = data.length;
                $('.appendType').empty();

                $('.appendType').append('<option value="">Choose Attribute Type</option>');
                $('.appendType').append('<option value="addAtrType">Add One</option>');
                for (var i = 0; i < length; i++) {
                    $('.appendType').append('<option value="' + data[i]['attribute_type_id'] + '">' + data[i]['attribute_type_name'] + ' </option>');

                }
            },

            dataType: "json"
        });

    }

    function get_attributeValue() {
        var class_id = $('.attibuteClassId').val();

        var type_id = $('.attibuteTypeId').val();

        console.log(type_id);

        console.log(class_id);


        $.ajax({

            url: "<?php echo $this->Url->build('/', true) ?>" + "AttributeValues/AdmingetValueData",

            data: {'attribute_values_class_id': class_id, 'attribute_values_type_id': type_id},
            type: "post",
            success: function (data) {

                // console.log(data);

                var length = data.length;
                $('.appendValue').empty();
                // '<option value="' + data[0].user.attribute_class_id + '" selected="selected">' + data[0].user.attribute_class_id + '</option>'
                for (var i = 0; i < length; i++) {
                    $('.appendValue').append('<option value="' + data[i]['attribute_field_id'] + '">' + data[i]['attribute_field_value'] + ',' + ' </option>');
                }
            },
            dataType: "json"
        });
    }

</script>


<script>
    function myReload() {
        location.reload();
    }
</script>

