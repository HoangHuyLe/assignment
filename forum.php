<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Required meta tags -->

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="./css/font-awesome.min.css" />

    <title>Forum</title>

    <style type="text/css">
      .forum-col {
        min-width: 16em;
      }
      .last-post-col {
        min-width: 12em;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <h1>
          <a href="#" class="navbar-brand">Forum</a>
        </h1>
      </div>
    </nav>
    <div class="container my-3">
      <nav>
        <form class="form-inline">
          <input
            type="text"
            class="form-control mr-3 mb-2 mb-sm-0"
            placeholder="Search"
          />
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </nav>
      <div class="row pt-4">
        <div class="col-12 col-xl-3">
          <img
            class="img-thumbnail img-circle"
            src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
            alt=""
          />
          <a
            class="h6 mb-0 font-weight-bold"
            href="https://frontendworkshop.com/courses/bootstrap-4-responsive-web-design-and-development/projects/online-forum/post.html"
            >Your name</a
          >
          &nbsp;
          <i class="fa fa-bell" aria-hidden="true"></i>
          <br />
          <button class="btn btn-primary">Tạo Forum</button>
        </div>
        <div class="col-12 col-xl-9">
          <h2 class="h4 bg-info mb-0 p-4 rounded-top">
            <p class="text-white">Danh Sách Các Bài Viết</p>
          </h2>
          <table class="table table-striped table-bordered table-responsive">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="forum-col">Tiêu đề</th>
                <th scope="col" class="text-nowrap">Bài viết</th>
                <th scope="col" class="text-nowrap">Lượt xem</th>
                <th scope="col" class="last-post-col">Bài viết cuối cùng</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <h3 class="h5 mb-0">
                    <a href="posts.html" class="text-uppercase">Forum name</a>
                  </h3>
                  <p class="mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                    laoreet pellentesque lorem sed elementum.
                  </p>
                </td>
                <td>
                  <div>5</div>
                </td>
                <td>
                  <div>18</div>
                </td>
                <td>
                  <div>
                    By
                    <a href="">Author name</a>
                  </div>
                  <div>05 Apr 2017, 20:07</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <footer class="small bg-dark text-white"></footer>
  </body>
</html>
