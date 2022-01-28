<template>
  <el-form ref="form" :model="form" label-width="120px">
    <el-row>
      <el-col :span="6">
        <el-form-item label="Имя">
          <el-input v-model="form.name"></el-input>
        </el-form-item>
      </el-col>
    </el-row>
    <el-row>
      <el-col :span="6">
        <el-form-item label="Телефон">
          <el-input v-model="form.phone"></el-input>
        </el-form-item>
      </el-col>
    </el-row>
    <el-form-item label="Обращение">
      <el-input type="textarea" v-model="form.message"></el-input>
    </el-form-item>
    <el-form-item>
      <el-button type="primary" @click="onSubmit">Отправить</el-button>
    </el-form-item>
  </el-form>
</template>

<script>
import axios from 'axios';

export default {
  name: "feedback",
  data() {
    return {
      form: {
        name: '',
        phone: '',
        message: ''
      }
    }
  },
  methods: {

    onSubmit: function(event) {
      const loading = this.$loading({
        lock: true,
        text: 'Loading',
        spinner: 'el-icon-loading',
        background: 'rgba(0, 0, 0, 0.7)'
      });
      axios.post('/api/feedback', this.form, {
        headers: {
          "Content-type": "application/json"
        }
      }).then(res => {
        loading.close();
        if (res.data.status) {
          this.clearForm();
        } else {
          this.handlerValidate(res.data.errors);
        }
      }).finally(() => {
        loading.close();
      })
    },

    clearForm: function () {
      this.form.name = '';
      this.form.phone = '';
      this.form.message = '';
    },

    handlerValidate: function (errors) {
      let errorMassage = '';
      if (errors.name) {
        errorMassage += 'Имя - ' + this.buildMessage(errors.name) + '   ';
      }
      if (errors.phone) {
        errorMassage += 'Телефон - ' + this.buildMessage(errors.phone) + '   ';
      }
      if (errors.message) {
        errorMassage += 'Обращение - ' + this.buildMessage(errors.message) + '   ';
      }
      this.$message({
          showClose: true,
          message: errorMassage,
          type: 'error',
          duration: 30000,
    });
    },

    buildMessage: function (messages) {
      let message = '';
      messages.map((element) => {
        message += element + ', ';
        return true;
      })
      return message.substring(0, message.length - 2);
    },
  }
}
</script>

<style scoped>

</style>