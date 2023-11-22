<div class="container-fluid" style="margin-top: 7rem !important">
    <div class="container-fluid mt-5">
        <h2 class="mb-4">New Attribute</h2>
        <form method="post" action="/submit-product">
            <!-- Existing form fields... -->

            <!-- Attribute Configuration Section -->
            <div class="form-group row">
                <label for="enableProduct" class="col-sm-2 col-form-label">Required</label>
                <div class="col-sm-10">
                    <select class="form-control" id="enableProduct" name="enableProduct">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="productName" class="col-sm-2 col-form-label">Attribute Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="attributeName" name="attributeName">
                </div>
            </div>

            <div class="form-group row">
                <label for="attributeType" class="col-sm-2 col-form-label">Attribute Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="attributeType" name="attributeType" onchange="toggleAttributeInput()">
                        <option value="text">Text</option>
                        <option value="textarea">Text Area</option>
                        <option value="boolean">Yes/No</option>
                        <option value="multiselect">Multiple Select</option>
                        <option value="select">Dropdown</option>
                    </select>
                </div>
            </div>

            <div id="attributeConfiguration" style="display:none;"></div>

            <!-- End of Attribute Configuration Section -->

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function toggleAttributeInput() {
            var attributeType = document.getElementById("attributeType").value;
            var attributeConfiguration = document.getElementById("attributeConfiguration");

            // Clear previous configuration fields
            attributeConfiguration.innerHTML = "";

            // Add configuration fields based on selected attribute type
            if (attributeType === "select" || attributeType === "multiselect") {
                // For select and multiselect, add options input and "Add Value" button
                attributeConfiguration.innerHTML = `
                    <div class="form-group row" id="attributeOptionsContainer">
                        <label for="attributeOptions" class="col-sm-2 col-form-label">Options</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="attributeOptions" name="attributeOptions[]" placeholder="Enter option value">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-secondary mt-2" onclick="addOption()">Add Value</button>
                        </div>
                    </div>
                `;
            }
            attributeConfiguration.style.display = "block";
        }

        function addOption() {
            // Function to add a new input field for option values
            var attributeOptionsContainer = document.getElementById("attributeOptionsContainer");
            var newInput = document.createElement("div");
            newInput.className = "form-group row";
            newInput.innerHTML = `
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <input type="text" class="form-control mt-2" name="attributeOptions[]" placeholder="Enter option value">
                </div>
            `;
            attributeOptionsContainer.parentNode.insertBefore(newInput, attributeOptionsContainer.nextSibling);
        }
    </script>
</div>
