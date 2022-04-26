@props(['title' => 'Image Processing', 'module_cropper' => true, 'module_resize' => true])

<div class="modal fade" tabindex="-1" role="dialog" id="imgproc-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="imgproc-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-center w-100" id="imgproc-result">
                                    <img src="" alt="Picture" class="mw-100"> 
                                </div>
                                <div class="text-center w-100" id="imgproc-container">
                                    <img src="" alt="Picture" class="mw-100">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-center mb-3">
                                <div class="container">
                                    <div class="row mt-2" id="imgproc-cropper-actions">
                                        <div class="col-md-12">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" data-action="cropper" 
                                                    data-method="setDragMode" data-option="move" title="Move">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.setDragMode(&quot;move&quot;)">
                                                        <span class="fa fa-arrows-alt"></span>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn btn-primary" data-action="cropper" 
                                                    data-method="setDragMode" data-option="crop" title="Crop">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.setDragMode(&quot;crop&quot;)">
                                                        <span class="fa fa-crop-alt"></span>
                                                    </span>
                                                </button>
                                            </div>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" data-action="cropper"  data-method="zoom"
                                                    data-option="0.1" title="Zoom In">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.zoom(0.1)">
                                                        <span class="fa fa-search-plus"></span>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn btn-primary" data-action="cropper"  data-method="zoom"
                                                    data-option="-0.1" title="Zoom Out">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.zoom(-0.1)">
                                                        <span class="fa fa-search-minus"></span>
                                                    </span>
                                                </button>
                                            </div>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" data-action="cropper"  data-method="move"
                                                    data-option="-10" data-second-option="0" title="Move Left">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.move(-10, 0)">
                                                        <span class="fa fa-arrow-left"></span>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn btn-primary" data-action="cropper"  data-method="move"
                                                    data-option="10" data-second-option="0" title="Move Right">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.move(10, 0)">
                                                        <span class="fa fa-arrow-right"></span>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn btn-primary" data-action="cropper"  data-method="move"
                                                    data-option="0" data-second-option="-10" title="Move Up">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.move(0, -10)">
                                                        <span class="fa fa-arrow-up"></span>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn btn-primary" data-action="cropper"  data-method="move"
                                                    data-option="0" data-second-option="10" title="Move Down">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.move(0, 10)">
                                                        <span class="fa fa-arrow-down"></span>
                                                    </span>
                                                </button>
                                            </div>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" data-action="cropper" 
                                                    data-method="scaleX" data-option="-1"
                                                    title="Flip Horizontal">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.scaleX(-1)">
                                                        <span class="fa fa-arrows-alt-h"></span>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn btn-primary" data-action="cropper" 
                                                    data-method="scaleY" data-option="-1"
                                                    title="Flip Vertical">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.scaleY(-1)">
                                                        <span class="fa fa-arrows-alt-v"></span>
                                                    </span>
                                                </button>
                                            </div>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" data-action="cropper"  data-method="reset"
                                                    data-option="-10" data-second-option="0" title="Reset">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="cropper.reset()">
                                                        <span class="fa fa-sync-alt"></span>
                                                    </span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-2" id="imgproc-cropper-aspectratio">
                                        <div class="col-md-12">
                                            <div class="btn-group mt-2" data-toggle="buttons">
                                                <label class="btn btn-primary active">
                                                    <input type="radio" class="sr-only"
                                                        id="imgproc-aspect-ratio1" name="aspectRatio"
                                                        value="1.7777777777777777">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="aspectRatio: 16 / 9">
                                                        16:9
                                                    </span>
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input type="radio" class="sr-only"
                                                        id="imgproc-aspect-ratio2" name="aspectRatio"
                                                        value="1.3333333333333333">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="aspectRatio: 4 / 3">
                                                        4:3
                                                    </span>
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input type="radio" class="sr-only"
                                                        id="imgproc-aspect-ratio3" name="aspectRatio" value="1">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="aspectRatio: 1 / 1">
                                                        1:1
                                                        </span>
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input type="radio" class="sr-only"
                                                        id="imgproc-aspect-ratio4" name="aspectRatio"
                                                        value="0.6666666666666666">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="aspectRatio: 2 / 3">
                                                        2:3
                                                    </span>
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input type="radio" class="sr-only"
                                                        id="imgproc-aspect-ratio5" name="aspectRatio"
                                                        value="NaN">
                                                    <span class="docs-tooltip" data-toggle="tooltip"
                                                        title="aspectRatio: NaN">
                                                        Free
                                                    </span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12" id="imgproc-compressor-options">
                                <div class="form-group">
                                    <label for="quality">Quality (%)</label>
                                    <select name="imgproc-quality" id="imgproc-quality" class="form-control">
                                        <option value="1">100</option>
                                        <option value="0.9">90</option>
                                        <option value="0.8" selected>80</option>
                                        <option value="0.7">70</option>
                                        <option value="0.6">60</option>
                                        <option value="0.5">50</option>
                                        <option value="0.4">40</option>
                                        <option value="0.3">30</option>
                                        <option value="0.2">20</option>
                                        <option value="0.1">10</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="width">Width (px)</label>
                                    <input type="text" class="form-control" id="imgproc-width">
                                </div>
                                <div class="form-group">
                                    <label for="height">Height (px)</label>
                                    <input type="text" class="form-control" id="imgproc-height">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="btn-group" id="imgproc-mode">
                                    @if ($module_cropper)    
                                        <button type="button" class="btn btn-primary"
                                            id="imgproc-modecrop" title="Crop">
                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                title="Crop Image">
                                                <span class="fa fa-crop-alt"></span>
                                            </span>
                                            Crop
                                        </button>
                                    @endif
                                    @if ($module_resize)    
                                        <button type="button" class="btn btn-primary"
                                            id="imgproc-moderesize" title="Resize">
                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                title="Resize Image">
                                                <span class="fa fa-compress"></span>
                                            </span>
                                            Resize
                                        </button>
                                    @endif
                                </div> 

                                <div class="btn-group" id="imgproc-action">
                                    <button type="button" class="btn btn-primary" id="imgproc-savechanges">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
                                    <button type="button" class="btn btn-danger" id="imgproc-cancel">
                                        <i class="fas fa-trash"></i> Cancel
                                    </button>
                                </div> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Done">DONE</button>
            </div>
        </div>
    </div>
</div>