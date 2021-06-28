<?php
defined("BASEPATH") or exit("No direct script access allowed");

class cadmin extends CI_Controller
{
  function index()
  {
    if (
      $this->session->userdata("nama") == "" &&
      $this->session->userdata("is_admin") == "0" &&
      $this->session->userdata("email") == ""
    ) {
      redirect(base_url());
    }
    if ($this->madmin->logged_id()) {
      $this->load->view("component/head");
      $this->load->view("component/navbar");
      $this->load->view("component/sidebar");
      $this->load->view("dashboard/index");
      $this->load->view("component/footer");
    } else {
      redirect(base_url());
    }
  } //end index

  // =================== start campaign ================================

  function campaign()
  {
    if (
      $this->session->userdata("nama") == "" &&
      $this->session->userdata("is_admin") == "0" &&
      $this->session->userdata("email") == ""
    ) {
      redirect(base_url());
    }
    if ($this->madmin->logged_id()) {
      $this->load->view("component/head");
      $this->load->view("component/navbar");
      $this->load->view("component/sidebar");
      $this->load->view("dashboard/campaign/campaign");
      $this->load->view("component/footer");
    } else {
      redirect(base_url());
    }
  }

  function campaigns()
  {
    $data = $this->madmin->get_campaigns();
    echo json_encode($data);
  }

  function sethl($id)
  {
    $this->madmin->unsethl();
    if ($this->db->affected_rows() > 0) {
      $this->madmin->sethl($id);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata(
          "notif",
          '
                  <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
                  <i class="icon fa fa-check"></i>
                  Berhasil memperbaharui
                  </div>
                '
        );
        redirect("campaign");
      }
    }
  }

  function campaign_detail($id)
  {
    if (
      $this->session->userdata("nama") == "" &&
      $this->session->userdata("is_admin") == "0" &&
      $this->session->userdata("email") == ""
    ) {
      redirect(base_url());
    }
    if ($this->madmin->logged_id()) {
      $where = ["cfs_campaign.id" => $id];
      $get = $this->madmin
        ->get_campaignparticipant("cfs_campaign", $where)
        ->result();
      $data["result"] = $get;
      foreach ($get as $row);
      if ($row->id_id != "") {
        $indo = ["id" => $row->id_id];
        $data["indo"] = $this->madmin
          ->get_where("cfs_campaigndetail", $indo)
          ->result();
      }
      if ($row->id_en != "") {
        $eng = ["id" => $row->id_en];
        $data["eng"] = $this->madmin
          ->get_where("cfs_campaigndetail", $eng)
          ->result();
      }
      $this->load->view("component/head");
      $this->load->view("component/navbar");
      $this->load->view("component/sidebar");
      $this->load->view("dashboard/campaign/campaign_detail", $data);
      $this->load->view("component/footer");
    } else {
      redirect(base_url());
    }
  }

  function newlanguage($id)
  {
    if (
      $this->session->userdata("nama") == "" &&
      $this->session->userdata("is_admin") == "0" &&
      $this->session->userdata("email") == ""
    ) {
      redirect(base_url());
    }
    if ($this->madmin->logged_id()) {
      $where = ["cfs_campaigndetail.id" => $id];
      $data["result"] = $this->madmin
        ->get_where_join("cfs_campaigndetail", $where)
        ->result();

      $this->load->view("component/head");
      $this->load->view("component/navbar");
      $this->load->view("component/sidebar");
      $this->load->view("dashboard/campaign/newlanguage", $data);
      $this->load->view("component/footer");
    } else {
      redirect(base_url());
    }
  }

  function input_newlanguage()
  {
    $title = $this->input->post("judul", true);
    $string = strtolower(str_replace(" ", "-", $title));
    $slug = preg_replace("/[^a-zA-Z0-9\-\&]/", "", $string);
    $cek = $this->db
      ->query("SELECT * FROM cfs_campaigndetail where slug='" . $slug . "'")
      ->num_rows();
    if ($cek > 0) {
      $slugplus = $slug . "-1";
      $this->madmin->input_campaigndetail($slugplus);
      $id = $this->db->insert_id();
      $this->madmin->update_campaign($id);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata(
          "notif",
          '
								<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
								<i class="icon fa fa-check"></i>
								Tambah bahasa berhasil di tambahkan
								</div>
							'
        );
        redirect("campaign");
      }
    } else {
      $this->madmin->input_campaigndetail($slug);
      $id = $this->db->insert_id();
      $this->madmin->update_campaign($id);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata(
          "notif",
          '
								<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
								<i class="icon fa fa-check"></i>
								Tambah bahasa berhasil di tambahkan
								</div>
							'
        );
        redirect("campaign");
      }
    }
  }

  function campaign_approve($id)
  {
    $this->madmin->campaign_approve($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
        "notif",
        '
								<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
								<i class="icon fa fa-check"></i>
								Status Campaign berhasil di perbaharui
								</div>
							'
      );
      redirect("campaign/" . $id);
    }
  }

  function input_message()
  {
    $this->madmin->input_message();
    $id_message = $this->db->insert_id();
    $this->madmin->update_messagecampaign($id_message);
    $id = $this->input->post("id", true);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
        "notif",
        '
								<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
								<i class="icon fa fa-check"></i>
								Status Campaign berhasil di perbaharui
								</div>
							'
      );
      redirect("campaign/" . $id);
    }
  }

  // ==================== end campaign ====================================

  // =================== start category ================================

  function category()
  {
    if (
      $this->session->userdata("nama") == "" &&
      $this->session->userdata("is_admin") == "0" &&
      $this->session->userdata("email") == ""
    ) {
      redirect(base_url());
    }
    if ($this->madmin->logged_id()) {
      $this->load->view("component/head");
      $this->load->view("component/navbar");
      $this->load->view("component/sidebar");
      $this->load->view("dashboard/campaign/campaign_category");
      $this->load->view("component/footer");
    } else {
      redirect(base_url());
    }
  }

  function campaign_category()
  {
    $data = $this->madmin->get_categories();
    echo json_encode($data);
  }

  function input_category()
  {
    $this->madmin->input_category();
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
        "notif",
        '
								<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
								<i class="icon fa fa-check"></i>
								Kategori baru berhasil di tambah
								</div>
							'
      );
      redirect("category");
    }
  }

  function testt()
  {
    $a = $this->input->post("numberr", true);
    $b = $this->input->post("number2", true);
    if ($a == null) {
      $c = $b;
    } elseif ($b == null) {
      $c = $a;
    }
    echo "Amount : " . $c;
  }
  // ==================== end catogory ====================================

  // =================== start donation ================================

  public function donation()
  {
    if (
      $this->session->userdata("nama") == "" &&
      $this->session->userdata("is_admin") == "0" &&
      $this->session->userdata("email") == ""
    ) {
      redirect(base_url());
    }
    if ($this->madmin->logged_id()) {
      $this->load->view("component/head");
      $this->load->view("component/navbar");
      $this->load->view("component/sidebar");
      $this->load->view("dashboard/donation");
      $this->load->view("component/footer");
    } else {
      redirect(base_url());
    }
  }

  function get_donation()
  {
    $data = $this->madmin->get_donation();
    echo json_encode($data);
  }

  // =================== end donation ================================

  // =================== start participant ================================

  function participant()
  {
    if (
      $this->session->userdata("nama") == "" &&
      $this->session->userdata("is_admin") == "0" &&
      $this->session->userdata("email") == ""
    ) {
      redirect(base_url());
    }
    if ($this->madmin->logged_id()) {
      $data["registered"] = $this->madmin->regpart_count();
      $data["waiting"] = $this->madmin->waitpart_count();
      $data["danied"] = $this->madmin->daniedpart_count();
      $data["actived"] = $this->madmin->activepart_count();
      $data["banned"] = $this->madmin->bannedpart_count();
      $this->load->view("component/head");
      $this->load->view("component/navbar");
      $this->load->view("component/sidebar");
      $this->load->view("dashboard/participant/participant_list", $data);
      $this->load->view("component/footer");
    } else {
      redirect(base_url());
    }
  }

  function all_participant()
  {
    $data = $this->madmin->get_participant();
    echo json_encode($data);
  }
  function active_participant()
  {
    $data = $this->madmin->get_activepart();
    echo json_encode($data);
  }
  function unve_participant()
  {
    $data = $this->madmin->get_unvepart();
    echo json_encode($data);
  }
  function wait_participant()
  {
    $data = $this->madmin->get_waitpart();
    echo json_encode($data);
  }
  function danied_participant()
  {
    $data = $this->madmin->get_daniedpart();
    echo json_encode($data);
  }
  function banned_participant()
  {
    $data = $this->madmin->get_bannedpart();
    echo json_encode($data);
  }

  function participant_detail($id)
  {
    if (
      $this->session->userdata("nama") == "" &&
      $this->session->userdata("is_admin") == "0" &&
      $this->session->userdata("email") == ""
    ) {
      redirect(base_url());
    }
    if ($this->madmin->logged_id()) {
      $where = ["id" => $id];
      $data["result"] = $this->madmin
        ->get_join("cfs_participant", $where)
        ->result();
      $this->load->view("component/head");
      $this->load->view("component/navbar");
      $this->load->view("component/sidebar");
      $this->load->view("dashboard/participant/participant_detail", $data);
      $this->load->view("component/footer");
    } else {
      redirect(base_url());
    }
  }

  function upload_image()
  {
    if (isset($_FILES["image"]["name"])) {
      $config["upload_path"] = "./assets/images/";
      $config["allowed_types"] = "jpg|jpeg|png|gif";
      $this->load->library("upload");
      $this->upload->initialize($config);
      if (!$this->upload->do_upload("image")) {
        $this->upload->display_errors();
        return false;
      } else {
        $data = $this->upload->data();
        //Compress Image
        $config["image_library"] = "gd2";
        $config["source_image"] = "./assets/images/" . $data["file_name"];
        $config["create_thumb"] = false;
        $config["maintain_ratio"] = true;
        $config["quality"] = "60%";
        $config["width"] = 800;
        $config["height"] = 800;
        $config["new_image"] = "./assets/images/" . $data["file_name"];
        $this->load->library("image_lib", $config);
        $this->image_lib->resize();
        echo base_url() . "assets/images/" . $data["file_name"];
      }
    }
  }

  function delete_image()
  {
    $src = $this->input->post("src");
    $file_name = str_replace(base_url(), "", $src);
    if (unlink($file_name)) {
      echo "File Delete Successfully";
    }
  }

  function approve($id)
  {
    $this->madmin->approve($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
        "pesan",
        '
                                    <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
                                    <i class="icon fa fa-info"></i>
                                    Data Berhasil diperbaharui
                                    </div>
                                '
      );
      redirect(base_url() . "participant/" . $id);
    }
  }

  function banned($id)
  {
    $this->madmin->banned($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata(
        "pesan",
        '
                                    <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
                                    <i class="icon fa fa-info"></i>
                                    Data Berhasil diperbaharui
                                    </div>
                                '
      );
      redirect(base_url() . "participant/" . $id);
    }
  }

  // =================== end participant ================================
} //end class
