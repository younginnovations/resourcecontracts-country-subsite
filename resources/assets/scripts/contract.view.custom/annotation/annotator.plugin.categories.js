Annotator.Plugin.Categories = (function(superClass) {
  __extends(Categories, superClass);

  Categories.prototype.options = {
    categories: [],
    categoryColorClasses: {},
    categoryClass: "annotator-category",
    classForSelectedCategory: "annotator-category-selected",
    emptyCategory: "Highlight",
    annotatorHighlight: 'span.annotator-hl'
  };

  Categories.prototype.events = {
    '.annotator-category click': "changeSelectedCategory",
    'annotationEditorSubmit': "saveCategory",
    'annotationEditorShown': "highlightSelectedCategory",
    // 'annotationsLoaded': 'changeHighlightColors'
  };

  Categories.prototype.field = null;

  Categories.prototype.input = null;

  Categories.prototype.widthSet = false;

  Categories.prototype.pluginInit = function() {
    if (!Annotator.supported()) {
      return;
    }
    this.options.categoryColorClasses[this.options.emptyCategory] = this.options.categoryClass + '-none';
    this.field = this.annotator.editor.addField({
      label: Annotator._t('Category'),
      options: this.options
    });
    $(document).delegate(".annotator-category", "tap", {
      preventDefault: false
    }, this.changeSelectedCategory);
    this.annotator.viewer.addField({  
      load: this.updateViewer,
      options: this.options
    });
    return this.input = $(this.field).find(':input');
  };

  function Categories(element, options) {
    this.changeSelectedCategory = __bind(this.changeSelectedCategory, this);
    Categories.__super__.constructor.call(this, element, options);
    this.element = element;
  }

  Categories.prototype.changeHighlightColors = function(annotations) {
    var annotation, category, cssClass, highlight, i, j, k, len, len1, ref, results;
    i = 0;
    // debugger;
    ref = this.options.category;
    for (j = 0, len = ref.length; j < len; j++) {
      category = ref[j];
      cssClass = this.options.categoryClass + '-' + i;
      this.options.categoryColorClasses[category] = cssClass;
      i++;
    }
    results = [];
    for (k = 0, len1 = annotations.length; k < len1; k++) {
      annotation = annotations[k];
      if ((annotation.category == null) || !annotation.category.length) {
        annotation.category = this.options.emptyCategory;
      }
      results.push(annotation);
    }
    return results;
  };

  Categories.prototype.setSelectedCategory = function(currentCategory) {
    $(this.field).find('.annotator-category').removeClass(this.options.classForSelectedCategory);
    if(currentCategory) $(this.field).find('select').val(currentCategory);   
    $('#annotation-plugin-select-category').select2({placeholder: 'Select Category'});
    return $(this.field).find('.annotator-category:contains(' + currentCategory + ')').addClass(this.options.classForSelectedCategory);
  };

  Categories.prototype.updateViewer = function(field, annotation) {
    var ref;
    field = $(field);
    // debugger;
    field.addClass(this.options.categoryClass).html(this.options.emptyCategory);
    if ((annotation.category != null) && annotation.category.length > 0) {
      // field.find('select').val(annotation.category);
      field.addClass(this.options.categoryClass).html(annotation.category);
      if (ref = annotation.category, indexOf.call(this.options.category, ref) >= 0) {
        // $(this.field).find('select option:selected').val()
        // return field.addClass(this.options.categoryColorClasses[annotation.category]);
      }
    }
  };

  Categories.prototype.changeSelectedCategory = function(event) {
    var category;
    category = $(event.target).html();
    return this.setSelectedCategory(category);
  };

  Categories.prototype.saveCategory = function(event, annotation) {
    // debugger;
    annotation.category = $(this.field).find('select option:selected').val()
    // annotation.category = $(this.field).find('.' + this.options.classForSelectedCategory).html();
    if ((annotation.text != null) && annotation.text.length > 0 && (annotation.category == null)) {
      window.alert('You did not choose a category, so the default has been chosen.');
      annotation.category = this.options.category[0];
    }
    if (annotation.category == null) {
      annotation.category = this.options.emptyCategory;
    }
    return this.changeHighlightColors([annotation]);
  };

  Categories.prototype.highlightSelectedCategory = function(event, annotation) {
    var category, categoryHTML, j, len, ref, totalWidth;
    if (annotation.category == null) {
      annotation.category = this.options.emptyCategory;
    }
    // categoryHTML = "";
    // ref = this.options.category;
    // for (j = 0, len = ref.length; j < len; j++) {
    //   category = ref[j];
    //   categoryHTML += '<span class="' + this.options.categoryClass;
    //   categoryHTML += ' ' + this.options.categoryColorClasses[category] + '">';
    //   categoryHTML += category;
    //   categoryHTML += '</span>';
    // }
    categoryHTML = "<select id='annotation-plugin-select-category'>";
    ref = this.options.category;
    for (j = 0, len = ref.length; j < len; j++) {
      category = ref[j];
      categoryHTML += '<option class="' + this.options.categoryClass;
      categoryHTML += ' ' + this.options.categoryColorClasses[category] + '"';
      categoryHTML += ' value="' + category + '">';
      categoryHTML += category;
      categoryHTML += '</option>';
    }
    categoryHTML += "</select>";

    $(this.field).html(categoryHTML);
    if (!this.widthSet) {
      this.widthSet = true;
      totalWidth = 5;
      $("span.annotator-category").each(function(index) {
        totalWidth += parseInt($(this).outerWidth(true), 10);
      });
      $(".annotator-editor .annotator-widget").width(totalWidth);
    }
    return this.setSelectedCategory(annotation.category);
  };

  return Categories;

})(Annotator.Plugin);