This `{project}/docs` directory off the root of this project is where an `mkdocs build` 
will generate your HTML+CSS+etc based on the markdown files in `{project}/mkdocs`.  

If you want to change the directory where your docs are output, such as to `/www/docs` 
you can do that by changing `site_dir:` in `{project}/mkdocs.yml` to be `'www/docs'` 
instead of just `'docs'.  