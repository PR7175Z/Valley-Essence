                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="http://localhost/phpsite/blogsite/assets/js/jquery.min.js"></script>
    <script src="http://localhost/phpsite/blogsite/assets/js/bootstrap.js"></script>
    <script src="http://localhost/phpsite/blogsite/assets/js/imgblob.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <!-- <script src="http://localhost/phpsite/blogsite/assets/js/script.js"></script> -->

    <script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });

    formids = ['blogaddform'];

    formids.forEach(formid => {
        var form = document.getElementById(formid);

        // Add a submit event listener to the form
        if(form){
            form.onsubmit = function(e) {
                // Get the content from the Quill editor
                var editorContent = quill.root.innerHTML;

                // Set the hidden input field's value to the editor content
                document.getElementById('editorContent').value = editorContent;
            };
        }
    });
    </script>
</body>
</html>