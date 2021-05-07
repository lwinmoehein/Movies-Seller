<div class="filters">
    <div class="year-filter">
        <label for="year_filter">Year</label>
        <select name="year_filter" id="year_filter"  onchange="onFiltersChanged()">
            <option value="" selected>Select All</option>
            @foreach ($years as $year)
                <option value="{{$year->year}}" {{old('year_filter')==$year->year?'selected':''}}>{{$year->year}}</option>
            @endforeach
        </select>
    </div>
    <div class="country-filter">
        <label for="country_filter">Country</label>
        <select name="country_filter" id="country_filter"  onchange="onFiltersChanged()">
            <option value="" selected>Select All</option>
            @foreach ($countries as $country)
                <option value="{{$country->id}}" {{old('country_filter')==$country->id?'selected':''}}>{{$country->country_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="category-filter">
        <label for="category_filter">Category</label>
        <select name="category_filter" id="category_filter" onchange="onFiltersChanged()">
            <option value="" selected>Select All</option>
        @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old('category_filter')==$category->id?'selected':''}}>{{$category->tag_name}}</option>
        @endforeach
        </select>
    </div>
</div>