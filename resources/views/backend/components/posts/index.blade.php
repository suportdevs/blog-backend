<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><i class="mdi mdi-file-document-outline"></i> Posts</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    @if(session('status'))
    <div class="content py-0 mt-0">
        <!-- Top Statistics -->
        <div class="row">
            <div class="alert alert-success alert-dismissible fade show py-3" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="content-wradminer">
        <div class="content pt-0 mt-0">
            <!-- Top Statistics -->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title mb-0">
                                    <i class="fas fa-file-alt"></i> Posts <small class="text-muted">Create</small>
                                </h4>
                                <div class="small text-muted">
                                    Posts Management Dashboard </div>
                            </div>
                            <!--/.col-->
                            <div class="col-4">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                    <a href="https://laravel.nasirkhn.com/admin/posts" class="btn btn-secondary btn-sm ml-1" data-toggle="tooltip" title="" data-original-title="Posts List"><i class="fas fa-list-ul"></i> List</a>
                                </div>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--/.row-->

                        <hr>

                        <div class="row mt-4">
                            <div class="col">
                                <form class="form" method="POST" action="https://laravel.nasirkhn.com/admin/posts"><input type="hidden" name="_token" value="MU7d8rsnqT6EHcR0m87cZJ6O8I1FyQqyn9sYcvHU">

                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="name">Name</label> <span class="text-danger">*</span>
                                                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required="">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input class="form-control" type="text" name="slug" id="slug" placeholder="Slug">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="created_by_alias">Author Name Alias</label>
                                                <input class="form-control" type="text" name="created_by_alias" id="created_by_alias" placeholder="Hide Author User's Name and use Alias">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="intro">Intro</label> <span class="text-danger">*</span>
                                                <textarea class="form-control" name="intro" id="intro" placeholder="Intro" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="content">Content</label> <span class="text-danger">*</span>
                                                <textarea class="form-control" name="content" id="content" placeholder="Content" style="visibility: hidden; display: none;"></textarea>
                                                <!-- <div id="cke_content" class="cke_1 cke cke_reset cke_chrome cke_editor_content cke_ltr cke_browser_webkit" dir="ltr" lang="en" role="application" aria-labelledby="cke_content_arialbl"><span id="cke_content_arialbl" class="cke_voice_label">Rich Text Editor, content</span>
                                                    <div class="cke_inner cke_reset" role="presentation">
                                                    <span id="cke_1_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;">
                                                    <span id="cke_8" class="cke_voice_label">Editor toolbars</span>
                                                    <span id="cke_1_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_8" onmousedown="return false;">
                                                    <span id="cke_11" class="cke_toolbar" aria-labelledby="cke_11_label" role="toolbar">
                                                    <span id="cke_11_label" class="cke_voice_label">Clipboard/Undo</span>
                                                    <span class="cke_toolbar_start">
                                                    </span><span class="cke_toolgroup" role="presentation">
                                                    <a id="cke_12" class="cke_button cke_button__cut cke_button_disabled " href="javascript:void('Cut')" title="Cut (Ctrl+X)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_12_label" aria-describedby="cke_12_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(2,event);" onfocus="return CKEDITOR.tools.callFunction(3,event);" onclick="CKEDITOR.tools.callFunction(4,this);return false;">
                                                    <span class="cke_button_icon cke_button__cut_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -264px;background-size:auto;">&nbsp;
                                                    </span>
                                                    <span id="cke_12_label" class="cke_button_label cke_button__cut_label" aria-hidden="false">Cut</span>
                                                    <span id="cke_12_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+X
                                                    </span></a>
                                                    <a id="cke_13" class="cke_button cke_button__copy cke_button_disabled " href="javascript:void('Copy')" title="Copy (Ctrl+C)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_13_label" aria-describedby="cke_13_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(5,event);" onfocus="return CKEDITOR.tools.callFunction(6,event);" onclick="CKEDITOR.tools.callFunction(7,this);return false;">
                                                    <span class="cke_button_icon cke_button__copy_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -216px;background-size:auto;">&nbsp;</span>
                                                    <span id="cke_13_label" class="cke_button_label cke_button__copy_label" aria-hidden="false">Copy</span>
                                                    <span id="cke_13_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+C</span></a><a id="cke_14" class="cke_button cke_button__paste cke_button_off" href="javascript:void('Paste')" title="Paste (Ctrl+V)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_14_label" aria-describedby="cke_14_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(8,event);" onfocus="return CKEDITOR.tools.callFunction(9,event);" onclick="CKEDITOR.tools.callFunction(10,this);return false;"><span class="cke_button_icon cke_button__paste_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -312px;background-size:auto;">&nbsp;</span><span id="cke_14_label" class="cke_button_label cke_button__paste_label" aria-hidden="false">Paste</span><span id="cke_14_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+V</span></a><a id="cke_15" class="cke_button cke_button__pastetext cke_button_off" href="javascript:void('Paste as plain text')" title="Paste as plain text (Ctrl+Shift+V)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_15_label" aria-describedby="cke_15_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(11,event);" onfocus="return CKEDITOR.tools.callFunction(12,event);" onclick="CKEDITOR.tools.callFunction(13,this);return false;"><span class="cke_button_icon cke_button__pastetext_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -720px;background-size:auto;">&nbsp;</span><span id="cke_15_label" class="cke_button_label cke_button__pastetext_label" aria-hidden="false">Paste as plain text</span><span id="cke_15_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+Shift+V</span></a><a id="cke_16" class="cke_button cke_button__pastefromword cke_button_off" href="javascript:void('Paste from Word')" title="Paste from Word" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_16_label" aria-describedby="cke_16_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(14,event);" onfocus="return CKEDITOR.tools.callFunction(15,event);" onclick="CKEDITOR.tools.callFunction(16,this);return false;"><span class="cke_button_icon cke_button__pastefromword_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -768px;background-size:auto;">&nbsp;</span><span id="cke_16_label" class="cke_button_label cke_button__pastefromword_label" aria-hidden="false">Paste from Word</span><span id="cke_16_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_17" class="cke_button cke_button__undo cke_button_disabled " href="javascript:void('Undo')" title="Undo (Ctrl+Z)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_17_label" aria-describedby="cke_17_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(17,event);" onfocus="return CKEDITOR.tools.callFunction(18,event);" onclick="CKEDITOR.tools.callFunction(19,this);return false;"><span class="cke_button_icon cke_button__undo_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -1008px;background-size:auto;">&nbsp;</span><span id="cke_17_label" class="cke_button_label cke_button__undo_label" aria-hidden="false">Undo</span><span id="cke_17_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+Z</span></a><a id="cke_18" class="cke_button cke_button__redo cke_button_disabled " href="javascript:void('Redo')" title="Redo (Ctrl+Y)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_18_label" aria-describedby="cke_18_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(20,event);" onfocus="return CKEDITOR.tools.callFunction(21,event);" onclick="CKEDITOR.tools.callFunction(22,this);return false;"><span class="cke_button_icon cke_button__redo_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -960px;background-size:auto;">&nbsp;</span><span id="cke_18_label" class="cke_button_label cke_button__redo_label" aria-hidden="false">Redo</span><span id="cke_18_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+Y</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_19" class="cke_toolbar" aria-labelledby="cke_19_label" role="toolbar"><span id="cke_19_label" class="cke_voice_label">Editing</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_20" class="cke_button cke_button__scayt cke_button_off cke_button_expandable" href="javascript:void('Spell Checker')" title="Spell Checker" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_20_label" aria-describedby="cke_20_description" aria-haspopup="menu" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(23,event);" onfocus="return CKEDITOR.tools.callFunction(24,event);" onclick="CKEDITOR.tools.callFunction(25,this);return false;" aria-expanded="false"><span class="cke_button_icon cke_button__scayt_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -888px;background-size:auto;">&nbsp;</span><span id="cke_20_label" class="cke_button_label cke_button__scayt_label" aria-hidden="false">Spell Check As You Type</span><span id="cke_20_description" class="cke_button_label" aria-hidden="false"></span><span class="cke_button_arrow"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_21" class="cke_toolbar" aria-labelledby="cke_21_label" role="toolbar"><span id="cke_21_label" class="cke_voice_label">Links</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_22" class="cke_button cke_button__link cke_button_off" href="javascript:void('Link')" title="Link (Ctrl+K)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_22_label" aria-describedby="cke_22_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(26,event);" onfocus="return CKEDITOR.tools.callFunction(27,event);" onclick="CKEDITOR.tools.callFunction(28,this);return false;"><span class="cke_button_icon cke_button__link_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -528px;background-size:auto;">&nbsp;</span><span id="cke_22_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Link</span><span id="cke_22_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+K</span></a><a id="cke_23" class="cke_button cke_button__unlink cke_button_disabled " href="javascript:void('Unlink')" title="Unlink" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_23_label" aria-describedby="cke_23_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(29,event);" onfocus="return CKEDITOR.tools.callFunction(30,event);" onclick="CKEDITOR.tools.callFunction(31,this);return false;"><span class="cke_button_icon cke_button__unlink_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -552px;background-size:auto;">&nbsp;</span><span id="cke_23_label" class="cke_button_label cke_button__unlink_label" aria-hidden="false">Unlink</span><span id="cke_23_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_24" class="cke_button cke_button__anchor cke_button_off" href="javascript:void('Anchor')" title="Anchor" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_24_label" aria-describedby="cke_24_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(32,event);" onfocus="return CKEDITOR.tools.callFunction(33,event);" onclick="CKEDITOR.tools.callFunction(34,this);return false;"><span class="cke_button_icon cke_button__anchor_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -504px;background-size:auto;">&nbsp;</span><span id="cke_24_label" class="cke_button_label cke_button__anchor_label" aria-hidden="false">Anchor</span><span id="cke_24_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_25" class="cke_toolbar" aria-labelledby="cke_25_label" role="toolbar"><span id="cke_25_label" class="cke_voice_label">Insert</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_26" class="cke_button cke_button__image cke_button_off" href="javascript:void('Image')" title="Image" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_26_label" aria-describedby="cke_26_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(35,event);" onfocus="return CKEDITOR.tools.callFunction(36,event);" onclick="CKEDITOR.tools.callFunction(37,this);return false;"><span class="cke_button_icon cke_button__image_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -360px;background-size:auto;">&nbsp;</span><span id="cke_26_label" class="cke_button_label cke_button__image_label" aria-hidden="false">Image</span><span id="cke_26_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_27" class="cke_button cke_button__table cke_button_off" href="javascript:void('Table')" title="Table" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_27_label" aria-describedby="cke_27_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(38,event);" onfocus="return CKEDITOR.tools.callFunction(39,event);" onclick="CKEDITOR.tools.callFunction(40,this);return false;"><span class="cke_button_icon cke_button__table_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -912px;background-size:auto;">&nbsp;</span><span id="cke_27_label" class="cke_button_label cke_button__table_label" aria-hidden="false">Table</span><span id="cke_27_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_28" class="cke_button cke_button__horizontalrule cke_button_off" href="javascript:void('Insert Horizontal Line')" title="Insert Horizontal Line" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_28_label" aria-describedby="cke_28_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(41,event);" onfocus="return CKEDITOR.tools.callFunction(42,event);" onclick="CKEDITOR.tools.callFunction(43,this);return false;"><span class="cke_button_icon cke_button__horizontalrule_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -336px;background-size:auto;">&nbsp;</span><span id="cke_28_label" class="cke_button_label cke_button__horizontalrule_label" aria-hidden="false">Insert Horizontal Line</span><span id="cke_28_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_29" class="cke_button cke_button__specialchar cke_button_off" href="javascript:void('Insert Special Character')" title="Insert Special Character" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_29_label" aria-describedby="cke_29_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(44,event);" onfocus="return CKEDITOR.tools.callFunction(45,event);" onclick="CKEDITOR.tools.callFunction(46,this);return false;"><span class="cke_button_icon cke_button__specialchar_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -864px;background-size:auto;">&nbsp;</span><span id="cke_29_label" class="cke_button_label cke_button__specialchar_label" aria-hidden="false">Insert Special Character</span><span id="cke_29_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_30" class="cke_toolbar" aria-labelledby="cke_30_label" role="toolbar"><span id="cke_30_label" class="cke_voice_label">Tools</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_31" class="cke_button cke_button__maximize cke_button_off" href="javascript:void('Maximize')" title="Maximize" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_31_label" aria-describedby="cke_31_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(47,event);" onfocus="return CKEDITOR.tools.callFunction(48,event);" onclick="CKEDITOR.tools.callFunction(49,this);return false;"><span class="cke_button_icon cke_button__maximize_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -672px;background-size:auto;">&nbsp;</span><span id="cke_31_label" class="cke_button_label cke_button__maximize_label" aria-hidden="false">Maximize</span><span id="cke_31_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_32" class="cke_toolbar" aria-labelledby="cke_32_label" role="toolbar"><span id="cke_32_label" class="cke_voice_label">Document</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_33" class="cke_button cke_button__source cke_button_off" href="javascript:void('Source')" title="Source" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_33_label" aria-describedby="cke_33_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(50,event);" onfocus="return CKEDITOR.tools.callFunction(51,event);" onclick="CKEDITOR.tools.callFunction(52,this);return false;"><span class="cke_button_icon cke_button__source_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -840px;background-size:auto;">&nbsp;</span><span id="cke_33_label" class="cke_button_label cke_button__source_label" aria-hidden="false">Source</span><span id="cke_33_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span class="cke_toolbar_break"></span><span id="cke_34" class="cke_toolbar" aria-labelledby="cke_34_label" role="toolbar"><span id="cke_34_label" class="cke_voice_label">Basic Styles</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_35" class="cke_button cke_button__bold cke_button_off" href="javascript:void('Bold')" title="Bold (Ctrl+B)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_35_label" aria-describedby="cke_35_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(53,event);" onfocus="return CKEDITOR.tools.callFunction(54,event);" onclick="CKEDITOR.tools.callFunction(55,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_35_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Bold</span><span id="cke_35_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+B</span></a><a id="cke_36" class="cke_button cke_button__italic cke_button_off" href="javascript:void('Italic')" title="Italic (Ctrl+I)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_36_label" aria-describedby="cke_36_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(56,event);" onfocus="return CKEDITOR.tools.callFunction(57,event);" onclick="CKEDITOR.tools.callFunction(58,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_36_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Italic</span><span id="cke_36_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+I</span></a><a id="cke_37" class="cke_button cke_button__strike cke_button_off" href="javascript:void('Strikethrough')" title="Strikethrough" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_37_label" aria-describedby="cke_37_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(59,event);" onfocus="return CKEDITOR.tools.callFunction(60,event);" onclick="CKEDITOR.tools.callFunction(61,this);return false;"><span class="cke_button_icon cke_button__strike_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -72px;background-size:auto;">&nbsp;</span><span id="cke_37_label" class="cke_button_label cke_button__strike_label" aria-hidden="false">Strikethrough</span><span id="cke_37_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_38" class="cke_button cke_button__removeformat cke_button_off" href="javascript:void('Remove Format')" title="Remove Format" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_38_label" aria-describedby="cke_38_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(62,event);" onfocus="return CKEDITOR.tools.callFunction(63,event);" onclick="CKEDITOR.tools.callFunction(64,this);return false;"><span class="cke_button_icon cke_button__removeformat_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -792px;background-size:auto;">&nbsp;</span><span id="cke_38_label" class="cke_button_label cke_button__removeformat_label" aria-hidden="false">Remove Format</span><span id="cke_38_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_39" class="cke_toolbar" aria-labelledby="cke_39_label" role="toolbar"><span id="cke_39_label" class="cke_voice_label">Paragraph</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_40" class="cke_button cke_button__numberedlist cke_button_off" href="javascript:void('Insert/Remove Numbered List')" title="Insert/Remove Numbered List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_40_label" aria-describedby="cke_40_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(65,event);" onfocus="return CKEDITOR.tools.callFunction(66,event);" onclick="CKEDITOR.tools.callFunction(67,this);return false;"><span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -648px;background-size:auto;">&nbsp;</span><span id="cke_40_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">Insert/Remove Numbered List</span><span id="cke_40_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_41" class="cke_button cke_button__bulletedlist cke_button_off" href="javascript:void('Insert/Remove Bulleted List')" title="Insert/Remove Bulleted List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_41_label" aria-describedby="cke_41_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(68,event);" onfocus="return CKEDITOR.tools.callFunction(69,event);" onclick="CKEDITOR.tools.callFunction(70,this);return false;"><span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -600px;background-size:auto;">&nbsp;</span><span id="cke_41_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">Insert/Remove Bulleted List</span><span id="cke_41_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_42" class="cke_button cke_button__outdent cke_button_disabled " href="javascript:void('Decrease Indent')" title="Decrease Indent" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_42_label" aria-describedby="cke_42_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(71,event);" onfocus="return CKEDITOR.tools.callFunction(72,event);" onclick="CKEDITOR.tools.callFunction(73,this);return false;"><span class="cke_button_icon cke_button__outdent_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -456px;background-size:auto;">&nbsp;</span><span id="cke_42_label" class="cke_button_label cke_button__outdent_label" aria-hidden="false">Decrease Indent</span><span id="cke_42_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_43" class="cke_button cke_button__indent cke_button_disabled" href="javascript:void('Increase Indent')" title="Increase Indent" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_43_label" aria-describedby="cke_43_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(74,event);" onfocus="return CKEDITOR.tools.callFunction(75,event);" onclick="CKEDITOR.tools.callFunction(76,this);return false;"><span class="cke_button_icon cke_button__indent_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -408px;background-size:auto;">&nbsp;</span><span id="cke_43_label" class="cke_button_label cke_button__indent_label" aria-hidden="false">Increase Indent</span><span id="cke_43_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_44" class="cke_button cke_button__blockquote cke_button_off" href="javascript:void('Block Quote')" title="Block Quote" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_44_label" aria-describedby="cke_44_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(77,event);" onfocus="return CKEDITOR.tools.callFunction(78,event);" onclick="CKEDITOR.tools.callFunction(79,this);return false;"><span class="cke_button_icon cke_button__blockquote_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 -168px;background-size:auto;">&nbsp;</span><span id="cke_44_label" class="cke_button_label cke_button__blockquote_label" aria-hidden="false">Block Quote</span><span id="cke_44_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_45" class="cke_toolbar" aria-labelledby="cke_45_label" role="toolbar"><span id="cke_45_label" class="cke_voice_label">Styles</span><span class="cke_toolbar_start"></span><span id="cke_9" class="cke_combo cke_combo__styles cke_combo_off" role="presentation"><span id="cke_9_label" class="cke_combo_label">Styles</span><a class="cke_combo_button" title="Formatting Styles" tabindex="-1" href="javascript:void('Formatting Styles')" hidefocus="true" role="button" aria-labelledby="cke_9_label" aria-haspopup="listbox" onkeydown="return CKEDITOR.tools.callFunction(81,event,this);" onfocus="return CKEDITOR.tools.callFunction(82,event);" onclick="CKEDITOR.tools.callFunction(80,this);return false;" aria-expanded="false"><span id="cke_9_text" class="cke_combo_text cke_combo_inlinelabel">Styles</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span id="cke_10" class="cke_combo cke_combo__format cke_combo_off" role="presentation"><span id="cke_10_label" class="cke_combo_label">Format</span><a class="cke_combo_button" title="Paragraph Format" tabindex="-1" href="javascript:void('Paragraph Format')" hidefocus="true" role="button" aria-labelledby="cke_10_label" aria-haspopup="listbox" onkeydown="return CKEDITOR.tools.callFunction(84,event,this);" onfocus="return CKEDITOR.tools.callFunction(85,event);" onclick="CKEDITOR.tools.callFunction(83,this);return false;" aria-expanded="false"><span id="cke_10_text" class="cke_combo_text">Normal</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_46" class="cke_toolbar cke_toolbar_last" aria-labelledby="cke_46_label" role="toolbar"><span id="cke_46_label" class="cke_voice_label">about</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_47" class="cke_button cke_button__about cke_button_off" href="javascript:void('About CKEditor 4')" title="About CKEditor 4" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_47_label" aria-describedby="cke_47_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(86,event);" onfocus="return CKEDITOR.tools.callFunction(87,event);" onclick="CKEDITOR.tools.callFunction(88,this);return false;"><span class="cke_button_icon cke_button__about_icon" style="background-image:url('https://laravel.nasirkhn.com/vendor/ckeditor/plugins/icons.png?t=K87C');background-position:0 0px;background-size:auto;">&nbsp;</span><span id="cke_47_label" class="cke_button_label cke_button__about_label" aria-hidden="false">About CKEditor 4</span><span id="cke_47_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span></span></span>
                                                        <div id="cke_1_contents" class="cke_contents cke_reset" role="presentation" style="height: 200px;"><span id="cke_52" class="cke_voice_label">Press ALT 0 for help</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" style="width: 100%; height: 100%;" title="Rich Text Editor, content" aria-describedby="cke_52" tabindex="0" allowtransparency="true"></iframe></div><span id="cke_1_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;"><span id="cke_1_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Resize" onmousedown="CKEDITOR.tools.callFunction(0, event)">◢</span><span id="cke_1_path_label" class="cke_voice_label">Elements path</span><span id="cke_1_path" class="cke_path" role="group" aria-labelledby="cke_1_path_label"><a id="cke_elementspath_7_1" href="javascript:void('body')" tabindex="-1" class="cke_path_item" title="body element" hidefocus="true" draggable="false" ondragstart="return false;" onkeydown="return CKEDITOR.tools.callFunction(90,1, event );" onclick="CKEDITOR.tools.callFunction(89,1); return false;" role="button" aria-label="body element">body</a><a id="cke_elementspath_7_0" href="javascript:void('p')" tabindex="-1" class="cke_path_item" title="p element" hidefocus="true" draggable="false" ondragstart="return false;" onkeydown="return CKEDITOR.tools.callFunction(90,0, event );" onclick="CKEDITOR.tools.callFunction(89,0); return false;" role="button" aria-label="p element">p</a><span class="cke_path_empty">&nbsp;</span></span></span>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="featured_image">Featured Image</label> <span class="text-danger">*</span>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" type="file" name="featured_image" id="featured_image" placeholder="Featured Image" required="" aria-label="Image" aria-describedby="button-image">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="button" id="button-image"><i class="fas fa-folder-open"></i> Browse</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="category_id">Category</label> <span class="text-danger">*</span>
                                                <select class="form-control select2-category select2-hidden-accessible" name="category_id" id="category_id" required="" data-select2-id="category_id" tabindex="-1" aria-hidden="true">
                                                    <option value="" selected="selected" data-select2-id="7">-- Select an option --</option>
                                                    <option value="0" data-select2-id="8"></option>
                                                </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="9" style="width: 311px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-category_id-container"><span class="select2-selection__rendered" id="select2-category_id-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">-- Select an option --</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="type">Type</label> <span class="text-danger">*</span>
                                                <select class="form-control select2 select2-hidden-accessible" name="type" id="type" required="" data-select2-id="type" tabindex="-1" aria-hidden="true">
                                                    <option value="" selected="selected" data-select2-id="2">-- Select an option --</option>
                                                    <option value="Article">Article</option>
                                                    <option value="Feature">Feature</option>
                                                    <option value="News">News</option>
                                                </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="1" style="width: 311px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-type-container"><span class="select2-selection__rendered" id="select2-type-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">-- Select an option --</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="is_featured">Is Featured</label> <span class="text-danger">*</span>
                                                <select class="form-control select2 select2-hidden-accessible" name="is_featured" id="is_featured" required="" data-select2-id="is_featured" tabindex="-1" aria-hidden="true">
                                                    <option value="" selected="selected" data-select2-id="4">-- Select an option --</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="3" style="width: 311px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-is_featured-container"><span class="select2-selection__rendered" id="select2-is_featured-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">-- Select an option --</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="tags_list[]">Tags</label>
                                                <select class="form-control select2-tags select2-hidden-accessible" name="tags_list[]" id="tags_list[]" multiple="" data-select2-id="tags_list[]" tabindex="-1" aria-hidden="true">
                                                    <option value="0" data-select2-id="10"></option>
                                                </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="11" style="width: 993px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                                            <ul class="select2-selection__rendered">
                                                                <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="-- Select an option --" style="width: 991px;"></li>
                                                            </ul>
                                                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="status">Status</label> <span class="text-danger">*</span>
                                                <select class="form-control select2 select2-hidden-accessible" name="status" id="status" required="" data-select2-id="status" tabindex="-1" aria-hidden="true">
                                                    <option value="" selected="selected" data-select2-id="6">-- Select an option --</option>
                                                    <option value="1">Published</option>
                                                    <option value="0">Unpublished</option>
                                                    <option value="2">Draft</option>
                                                </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="5" style="width: 481.5px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-status-container"><span class="select2-selection__rendered" id="select2-status-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">-- Select an option --</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="published_at">Published At</label>
                                                <div class="input-group date datetime" id="published_at" data-target-input="nearest">
                                                    <input class="form-control datetimepicker-input" type="text" name="published_at" id="published_at" placeholder="Published At" data-target="#published_at">
                                                    <div class="input-group-append" data-target="#published_at" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="meta_title">Meta Title</label>
                                                <input class="form-control" type="text" name="meta_title" id="meta_title" placeholder="Meta Title">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="meta_keywords">Meta Keywords</label>
                                                <input class="form-control" type="text" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="order">Order</label>
                                                <input class="form-control" type="text" name="order" id="order" placeholder="Order">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="meta_description">Meta Description</label>
                                                <input class="form-control" type="text" name="meta_description" id="meta_description" placeholder="Meta Description">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="meta_og_image">Meta Open Graph Image</label>
                                                <input class="form-control" type="text" name="meta_og_image" id="meta_og_image" placeholder="Meta Open Graph Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="meta_og_url">Meta Open Graph URL</label>
                                                <input class="form-control" type="text" name="meta_og_url" id="meta_og_url" placeholder="Meta Open Graph URL">
                                            </div>
                                        </div>
                                    </div>
                                    <div></div>


                                    <!-- Select2 Library -->



                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit"><i class="fas fa-plus-circle"></i> Create</button>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-warning" onclick="history.back(-1)"><i class="fas fa-reply"></i> Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>