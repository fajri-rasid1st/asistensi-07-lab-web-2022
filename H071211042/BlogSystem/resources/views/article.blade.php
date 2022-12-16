@extends('layout.admin');
@section('content')
<div class="container-fluid" data-select2-id="11">
            <h2 class="text-center display-4">Enhanced Search</h2>
            <form action="enhanced-results.html" data-select2-id="10">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Result Type:</label>
                                    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Any" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="14">Text only</option>
                                        <option data-select2-id="15">Images</option>
                                        <option data-select2-id="16">Video</option>
                                    </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Any" style="width: 493.163px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Sort Order:</label>
                                    <select class="select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                        <option selected="" data-select2-id="5">ASC</option>
                                        <option data-select2-id="18">DESC</option>
                                    </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="4" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-p31t-container"><span class="select2-selection__rendered" id="select2-p31t-container" role="textbox" aria-readonly="true" title="ASC">ASC</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Order By:</label>
                                    <select class="select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="6" tabindex="-1" aria-hidden="true">
                                        <option selected="" data-select2-id="8">Title</option>
                                        <option data-select2-id="20">Date</option>
                                    </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="7" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-wqbk-container"><span class="select2-selection__rendered" id="select2-wqbk-container" role="textbox" aria-readonly="true" title="Date">Date</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection